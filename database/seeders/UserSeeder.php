<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'TheGainTech',
            'email' => 'thegaintech@gmail.com',
            'password' => Hash::make('thegaintech'),
            'username' =>'thegaintech' ,
            'is_admin' =>1,
            'created_at'=>now(),
        ]);
    }
}
