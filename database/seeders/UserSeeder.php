<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use App\Models\ChFavorite;

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
            'password' => Hash::make('password'),
            'profile_picture' => null
        ]);
        $admin->assignRole($roleAdmin);

        $roleUser = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        $user = User::create([
            'name' => "User",
            'number' => "089637885692",
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'profile_picture' => null
        ]);
        $user->assignRole($roleUser);

        if ($user) {
            $favorite = new ChFavorite();
            $favorite->id = Uuid::uuid4()->toString();
            $favorite->user_id = $user->id;
            $favorite->favorite_id = 1;
            $favorite->save();
        }
    }
}
