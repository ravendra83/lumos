<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'name' => Str::random(10),
            'dob' => date('Y-m-d'),
            'doj' => date('Y-m-d'),
            'location' => 1,
            'usertl' => 1,
            'user_language' => 'HI',
            'user_number' => '111',
            'password' => Hash::make('password'),
            'email' => Str::random(10).'@gmail.com',
            'ldap_email'=> Str::random(10).'@gmail.com',
            'sesame_email'=> Str::random(10).'@gmail.com',
            'type'=>1,
            'status'=>1,
            'onboard'=>'Review'            
        ]);
    }
}
