<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        if ($user) {
            $subscribe = $user->subscribe;

            if ($subscribe == 'no') {
                $accountStatus = 'Akun non Premium';
            } elseif ($subscribe == 'yes') {
                $accountStatus = 'Akun Premium';
            } else {
                $accountStatus = 'Status tidak valid';
            }
        }

        return view('User.ProfilUser', compact('user', 'accountStatus'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::FindOrFail(Auth::user()->id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'number' => 'required|min:11|max:12', // Tambahkan aturan min dan max di sini
            'old_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
        ],[
            'number' => 'Nomor tidak boleh kurang dari 11 dan tidak boleh lebih dari 12!',
            'email' => 'E-mail sudah pernah digunakan',

            // 'old_password' =>

        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;

        if ($request->filled('new_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Kata sandi lama tidak cocok.']);
            }
            $user->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('profile_picture')) {
            $oldProfilePicture = $user->profile_picture;
            if ($oldProfilePicture) {
                $oldProfilePath = public_path('profile_pictures/' . $oldProfilePicture);
                if (file_exists($oldProfilePath)) {
                    unlink($oldProfilePath);
                }
            }

            $profilePicturePath = $request->file('profile_picture')->move(public_path('profile_pictures'), $user->id . '.jpg');
            $user->profile_picture = 'profile_pictures/' . $user->id . '.jpg';
        }
        // dd('profile_picture');
        $user->update();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function profileAdmin()
    {
        $admin = Auth::user();
        return view('Admin.ProfilAdmin', compact('admin'));
    }

    public function updateAdmin(Request $request)
    {
        $admin = User::FindOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'email|unique:users,email,' . $admin->id,
            'old_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
        ],[
            'new_password' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->number = $request->number;

        if ($request->filled('new_password')) {
            if (!Hash::check($request->old_password, $admin->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Kata sandi lama tidak cocok.']);
            }
            $admin->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('profile_picture')) {
            $oldProfilePicture = $admin->profile_picture;
            if ($oldProfilePicture) {
                $oldProfilePath = public_path('profile_pictures/' . $oldProfilePicture);
                if (file_exists($oldProfilePath)) {
                    unlink($oldProfilePath);
                }
            }

            $profilePicturePath = $request->file('profile_picture')->move(public_path('profile_pictures'), $admin->id . '.jpg');
            $admin->profile_picture = 'profile_pictures/' . $admin->id . '.jpg';
        }
        $admin->update();
        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
}
