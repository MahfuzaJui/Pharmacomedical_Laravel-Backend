<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'userID' => 1,
            'name' => 'Jui',
            'email' => 'jui@gmail.com',
            'phoneNumber' => '+880 12345678',
            'password' => md5('123456'),
            'dob'=>'1999-05-29',
            'gender'=> 'female',
            'role' => 'admin',
            'verified'=> 'true',
        ]);
    }
}