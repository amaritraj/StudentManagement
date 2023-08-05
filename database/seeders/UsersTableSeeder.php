<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // Admin Seeder
            [
               'name'=>'Admin',
               'username'=>'admin',
               'email'=>'admin@gmail.com',
               'password'=>Hash::make('111'),
               'role'=>'admin',
               'status'=>'active',
            ],

            // Management Seeder
            [
                'name'=>'Managment',
                'username'=>'managment',
                'email'=>'managment@gmail.com',
                'password'=>Hash::make('111'),
                'role'=>'managment',
                'status'=>'active',
             ],

             // User Seeder
            [
                'name'=>'User',
                'username'=>'user',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('111'),
                'role'=>'user',
                'status'=>'active',
            ],

        ]);
    }
}
