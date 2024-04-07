<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'role_id' => 1, 
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
       
        User::create([
            'name' => 'David',
            'email' => 'david@user.com',
            'email_verified_at' => now(),
            'role_id' => 2,
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Joel',
            'email' => 'joel@user.com',
            'email_verified_at' => now(),
            'role_id' => 2, 
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'James',
            'email' => 'james@user.com',
            'email_verified_at' => now(),
            'role_id' => 2, 
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
