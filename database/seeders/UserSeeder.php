<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subscribe;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roleAdmin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $admin = User::create([
            'name' => "Admin",
            'number' => "089637885692",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'profile_picture' => null
        ]);
        $admin->assignRole($roleAdmin);

        $roleUser = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        $user = User::create([
            'name' => "mizu",
            'number' => "089637885692",
            'email' => 'mizu@gmail.com',
            'password' => Hash::make('gataumales'),
            'profile_picture' => null
        ]);
        $user->assignRole($roleUser);
    }
}
