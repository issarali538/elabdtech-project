<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedArray = [
           [ "name" => "admin",
            "email" => "admin@admin.com",
            "password" => "password",
            "role" => "admin"],
           [ "name" => "user",
            "email" => "user@user.com",
            "password" => "password",
            "role" => "user"],
        ];
        $user = new User();
        foreach($seedArray as $seed) {
            $user->create($seed);
        }
    }
}
