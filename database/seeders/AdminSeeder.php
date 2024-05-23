<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $user = new User;
        $user->name = "Ikki Sipaling Admin";
        $user->email = "iki@admin.com";
        $user->level = "admin";
        $user->password = Hash::make("12345678");
        $user->save();
        // untuk laravel 10 ke atas : 
        // $user->password = "inipassword";
    }
}
