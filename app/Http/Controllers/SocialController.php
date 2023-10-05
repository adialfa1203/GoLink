<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;
use Ramsey\Uuid\Uuid;

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
                'id' => Uuid::uuid4()->toString(),
                'name' => $googleUser->name,
                'email' => $googleUser->getEmail(),
                'number' => $googleUser->number ?? 'default_number',
                'password' => bcrypt('12345678'),
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
                'id' => Uuid::uuid4()->toString(),
                'name' => $facebookUser->name,
                'email' => $facebookUser->getEmail(),
                'number' => $facebookUser->number ?? 'default_number',
                'password' => bcrypt('12345678'),
                'facebook_id' => $facebookUser->id,
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

//     public function redirectTwitter(){
//         return Socialite::driver('twitter')->redirect();
//     }

//     public function twitterCallback()
//     {
//         $twitterUser = Socialite::driver('twitter')->user();
//         $user = User::where('email', '=', $twitterUser->email)->first();

//         if ($user) {
//             Auth::login($user);
//             return redirect()->route('dashboard.user');
//         } else {
//             $newUser = User::create([
//                 'name' => $twitterUser->name,
//                 'email' => $twitterUser->getEmail(),
//                 'number' => $twitterUser->number ?? 'default_number',
//                 'password' => bcrypt('12345678'),
//                 'twitter_id' => $twitterUser->id,
//                 'profile_picture' => 'default.jpg'
//             ]);

//             if (!Role::where('name', 'user')->exists()) {
//                 Role::create(['name' => 'user', 'guard_name' => 'web']);
//             }

//             $roleUser = Role::where('name', 'user')->first();

//             if ($roleUser) {
//                 $newUser->assignRole($roleUser);
//             }

//             Auth::login($newUser);
//             return redirect()->route('dashboard.user');
//         }
//     }

//     public function redirectGithub(){
//         return Socialite::driver('github')->redirect();
//     }

//     public function githubCallback()
//     {
//         $githubUser = Socialite::driver('github')->user();
//         $user = User::where('name', '=', $githubUser->name)->first();

//         if ($user) {
//             Auth::login($user);
//             return redirect()->route('dashboard.user');
//         } else {
//             $existingUser = User::where('name', '=', $githubUser->name)->first();

//             if ($existingUser) {
//             } else {
//                 $newUser = User::create([
//                     'name' => $githubUser->name,
//                     'profile_picture' => 'default.jpg'
//                 ]);

//                 if (!Role::where('name', 'user')->exists()) {
//                     Role::create(['name' => 'user', 'guard_name' => 'web']);
//                 }

//                 $roleUser = Role::where('name', 'user')->first();

//                 if ($roleUser) {
//                     $newUser->assignRole($roleUser);
//                 }

//                 Auth::login($newUser);
//             }

//             return redirect()->route('dashboard.user');
//         }
//     }

}
