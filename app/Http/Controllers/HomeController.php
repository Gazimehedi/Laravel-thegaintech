<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('index',compact('users'));
    }
    public function profile()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('profile',compact('user'));
    }
    public function profileupdate(Request $request)
    {
        $id = Auth::id();
        $request->validate([
            'name'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'bio'=>'required',
            'password'=>'confirmed',
        ]);
        $user = User::find($id);
        if($request->hasFile('image')){
            $oldimage = $user->profile_photo_path;
            if(File::exists($oldimage)){
                File::delete($oldimage);
            }
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $path = 'upload/';
            $img_name = 'profile_image_'.rand(111111,999999).'.'.$ext;
            $image->move($path,$img_name);
            $user->profile_photo_path = $path.$img_name;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->bio = $request->bio;
        if($request->password != ""){
            if(Hash::check($request->password,$user->password)){

                $user->password = Hash::make($request->password);
            }else{
                return redirect()->back()->with('error','your password is wrong');
            }
        }
        $user->save();

        return redirect()->back()->with('success','Profile updated successfully');
    }
    public function status($status,$id){
        $user = User::find($id);
        $user->status = $status;
        $user->save();
        return redirect()->back()->with('success','Profile status updated successfully');
    }
}
