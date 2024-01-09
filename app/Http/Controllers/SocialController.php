<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;
use Ramsey\Uuid\Uuid;
use App\Models\ChFavorite;
use App\Models\Social;
use Carbon\Carbon;
use Flasher\Laravel\Http\Request;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $avatar = $googleUser->getAvatar();
        $user = User::where('email', '=', $googleUser->email)->first();
        $today = Carbon::now();

        if ($user->subscription_end_date && $user->subscription_end_date < $today) {
            if ($user->subscribe == 'silver' || $user->subscribe == 'gold' || $user->subscribe == 'platinum') {
                $user->update(['subscribe' => 'free']);
            }
        }

        if ($user) {
            Auth::login($user);
            if ($user->is_banned) {
                Auth::logout();
                return redirect('id/login')->with('error', 'Akun Anda telah dibanned. Silakan hubungi admin untuk informasi lebih lanjut.');
            } else {
                return redirect()->route('dashboard.user')->withCookie(cookie('remember_web', true, 3));
            }
            // return redirect()->route('dashboard.user');
        } else {
            $googleId = $googleUser->getId();
            $hashedGoogleId = bcrypt($googleId);

            $newUser = User::create([
                'id' => Uuid::uuid4()->toString(),
                'google_id' => $hashedGoogleId,
                'name' => $googleUser->name,
                'email' => $googleUser->getEmail(),
                'number' => $googleUser->number ?? 'default_number',
                'profile_picture' => $avatar
            ]);

            if (!Role::where('name', 'user')->exists()) {
                Role::create(['name' => 'user', 'guard_name' => 'web']);
            }

            $roleUser = Role::where('name', 'user')->first();

            if ($roleUser) {
                $newUser->assignRole($roleUser);
            }

            if ($newUser) {
                $favorite = new ChFavorite();
                $favorite->id = Uuid::uuid4()->toString();
                $favorite->user_id = $newUser->id;
                $favorite->favorite_id = 1;
                $favorite->save();
            }

            Auth::login($newUser);
            return redirect()->route('dashboard.user');
        }
    }

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();
        $user = User::where('email', '=', $facebookUser->email)->first();

        if ($user) {
            Auth::login($user);
            if ($user->is_banned) {
                Auth::logout();
                return redirect('id/login')->with('error', 'Akun Anda telah dibanned. Silakan hubungi admin untuk informasi lebih lanjut.');
            } else {
                return redirect()->route('dashboard.user')->withCookie(cookie('remember_web', true, 3));
            }
            // return redirect()->route('dashboard.user');
        } else {
            $newUser = User::create([
                'id' => Uuid::uuid4()->toString(),
                'name' => $facebookUser->name,
                'email' => $facebookUser->getEmail(),
                'number' => $facebookUser->number ?? 'default_number',
                'password' => bcrypt('12345678'),
                'facebook_id' => $facebookUser->id,
                'profile_picture' => null
            ]);

            if (!Role::where('name', 'user')->exists()) {
                Role::create(['name' => 'user', 'guard_name' => 'web']);
            }

            $roleUser = Role::where('name', 'user')->first();

            if ($roleUser) {
                $newUser->assignRole($roleUser);
            }

            if ($newUser) {
                $favorite = new ChFavorite();
                $favorite->id = Uuid::uuid4()->toString();
                $favorite->user_id = $newUser->id;
                $favorite->favorite_id = 1;
                $favorite->save();
            }

            Auth::login($newUser);
            return redirect()->route('dashboard.user');
        }
    }

    public function moveUp(Social $social, $microsite_uuid) {
        $currentPosition = $social->order;
        $angkaDiatas = Social::where('microsite_uuid', $microsite_uuid)
            ->where('order', '<', $currentPosition)
            ->orderByDesc('order')
            ->first();

        if ($angkaDiatas) {
            $h = $currentPosition;

            $social->update(['order' => $angkaDiatas->order]);
            Social::findOrFail($angkaDiatas->id)->update(['order'=> $h]);
        }
        return response()->json(['code' => 200]);
    }

    public function moveDown(Social $social, $microsite_uuid) {
        $currentPosition = $social->order;
        $angkaDiatas = Social::where('microsite_uuid', $microsite_uuid)
            ->where('order', '>', $currentPosition)
            ->orderBy('order')
            ->first();

        if ($angkaDiatas) {
            $h = $currentPosition;

            $social->update(['order' => $angkaDiatas->order]);
            Social::findOrFail($angkaDiatas->id)->update(['order'=> $h]);
        }
        return response()->json(['code' => 200]);
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
