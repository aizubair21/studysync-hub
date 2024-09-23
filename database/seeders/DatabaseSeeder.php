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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin.aizubair@skiff.com',
            'password' => '$2y$12$bQ8txwCZbCHdcmN5xJosPO.aZfhOIoDdm7fFAnOFGJvjB90/.2K6S', //
        ]);
        
        Role::create(['name' => 'admin']);
        User::where("email", "admin.aizubair@skiff.com")->assignRole("admin");
        Role::create(['name' => 'vendor']);
        Role::create(['name' => 'member']);
        Permission::create(['name' => 'create_courses']);
        Permission::create(['name' => 'enroll_in_courses']);
        Permission::create(['name' => 'manage_users']);
    }
}
