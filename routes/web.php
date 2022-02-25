<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/user/dashboard', [HomeController::class, 'index'])->name('user.dashboard');
Route::get('/user/profile', [HomeController::class, 'profile'])->name('user.profile');
Route::put('/user/profile/update', [HomeController::class, 'profileupdate'])->name('user.profile.update');
Route::resource('/user',UserController::class)->names('user');
Route::get('/user/status/update/{status}/{id}', [HomeController::class, 'status'])->name('user.updatestatus');
