<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin.aizubair@skiff.com',
            'password' => Hash::make("password") //
        ]);
        
        // Role::create(['name' => 'admin']);
        // User::where("email", "=", "admin.aizubair@skiff.com")->assignRole("admin");
        // Role::create(['name' => 'instructor']);
        // Role::create(['name' => 'student']);
        // Permission::create(['name' => 'create_courses']);
        // Permission::create(['name' => 'enroll_in_courses']);
        // Permission::create(['name' => 'manage_users']);
    }
}
