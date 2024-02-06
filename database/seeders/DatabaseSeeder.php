<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'instructor']);
        Role::create(['name' => 'student']);
        Permission::create(['name' => 'create_courses']);
        Permission::create(['name' => 'enroll_in_courses']);
        Permission::create(['name' => 'manage_users']);
    }
}
