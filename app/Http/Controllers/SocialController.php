<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

class SocialController extends Controller
{
    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', '=', $googleUser->email)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard.user');
        } else {
            $newUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->getEmail(),
                'number' => $googleUser->number ?? 'default_number',
                'password' => bcrypt('12345678'),
                'google_id' => $googleUser->id,
                'profile_picture' => 'default.jpg'
            ]);

            if (!Role::where('name', 'user')->exists()) {
                Role::create(['name' => 'user', 'guard_name' => 'web']);
            }

            $roleUser = Role::where('name', 'user')->first();

            if ($roleUser) {
                $newUser->assignRole($roleUser);
            }

            Auth::login($newUser);
            return redirect()->route('dashboard.user');
        }
    }
    public function redirectFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();
        $user = User::where('email', '=', $facebookUser->email)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard.user');
        } else {
            $newUser = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->getEmail(),
                'number' => $facebookUser->number ?? 'default_number',
                'password' => bcrypt('12345678'),
                'google_id' => $facebookUser->id,
                'profile_picture' => 'default.jpg'
            ]);

            if (!Role::where('name', 'user')->exists()) {
                Role::create(['name' => 'user', 'guard_name' => 'web']);
            }

            $roleUser = Role::where('name', 'user')->first();

            if ($roleUser) {
                $newUser->assignRole($roleUser);
            }

            Auth::login($newUser);
            return redirect()->route('dashboard.user');
        }
    }
}
