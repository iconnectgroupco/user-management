<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'status' => '1',
        ]);
        Role::create([
            'name' => 'Employee',
            'slug' => 'employee',
            'status' => '1',
        ]);
        Role::create([
            'name' => 'Manager',
            'slug' => 'manager',
            'status' => '1',
        ]);

        User::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt(123456789),
            'contact_no' => "0000000000",
            'role_id' => $admin->id,
            'status' => "1",
        ]);
    }
}
