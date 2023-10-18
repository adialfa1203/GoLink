<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        if ($user) {
            $subscribe = $user->subscribe;

            if ($subscribe == 'free') {
                $accountStatus = 'Member Gratis';
            } elseif ($subscribe == 'silver') {
                $accountStatus = 'Member Silver';
            } elseif ($subscribe == 'gold') {
                $accountStatus = 'Member Gold';
            } elseif ($subscribe == 'platinum') {
                $accountStatus = 'Member Platinum';
            } else {
                $accountStatus = 'Status tidak valid';
            }
        }

        return view('User.ProfilUser', compact('user', 'accountStatus'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::FindOrFail(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|regex:/^[^-+]+$/u|email|regex:/^[A-Za-z0-9_.-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/|unique:users,email,' . $user->id,
            'number' => 'required|min:11|max:13|regex:/^[^-+]+$/u',
            'old_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
        ], [
            'name.max' => 'Nama tidak boleh lebih dari 50 huruf!',
            'number.required' => 'Kolom Nomer harus diisi',
            'number.min' => 'Nomor tidak boleh kurang dari 10!',
            'number.max' => 'Nomor tidak boleh lebih dari 13!',
            'email.unique' => 'Email sudah pernah digunakan',
            'email.required' => 'Kolom Email harus diisi',
            'email.regex' => 'Format alamat email tidak valid.',
            'old_password.required_with' => 'Kolom Password Lama harus diisi jika Anda ingin mengubah password.',
            'new_password.min' => 'Password baru harus memiliki panjang minimal 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok dengan password baru.',
            'profile_picture.image' => 'Kolom ini harus berisi gambar dengan format yang sesuai (jpeg, png, jpg).',
            'profile_picture.mimes' => 'Kolom ini harus berisi gambar dengan format yang sesuai (jpeg, png, jpg).',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

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
            if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                unlink(public_path('profile_pictures/' . $user->profile_picture));
            }

            $coverImage = $request->file('profile_picture');
            $coverImageName = time() . '_cover.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('profile_pictures'), $coverImageName);
            $user->profile_picture = $coverImageName;
        }
        // dd($request->email);
        $user->save();

        return redirect()->back()->with('success', 'Berhasil mengubah status profil.');
    }

    public function profileAdmin()
    {
        $admin = Auth::user();
        return view('Admin.ProfilAdmin', compact('admin'));
    }

    public function updateAdmin(Request $request)
    {
        $admin = User::FindOrFail(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[^-+]+$/u',
            'email' => 'email|regex:/^[^-+]+$/u|ends_with:.com|unique:users,email,' . $admin->id,
            'number' => 'required|min:11|max:13|regex:/^[^-+]+$/u',
            'old_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
        ], [
            'number.min' => 'Nomor tidak boleh kurang dari 11!',
            'number.max' => 'Nomor tidak boleh lebih dari 13!',
            'email.unique' => 'Email sudah pernah digunakan',
            'email.required' => 'Kolom Email harus diisi',
            'email.ends_with' => 'Email harus berakhir dengan .com',
            'old_password.required_with' => 'Kolom Password Lama harus diisi jika Anda ingin mengubah password.',
            'new_password.min' => 'Password baru harus memiliki panjang minimal 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok dengan password baru.',
            'profile_picture.image' => 'Kolom ini harus berisi gambar dengan format yang sesuai (jpeg, png, jpg).',
            'profile_picture.mimes' => 'Kolom ini harus berisi gambar dengan format yang sesuai (jpeg, png, jpg).',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
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
            if ($admin->profile_picture && file_exists(public_path('profile_pictures/' . $admin->profile_picture))) {
                unlink(public_path('profile_pictures/' . $admin->profile_picture));
            }

            $coverImage = $request->file('profile_picture');
            $coverImageName = time() . '_cover.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('profile_pictures'), $coverImageName);
            $admin->profile_picture = $coverImageName;
        }
        // dd($request->profile_picture);
        $admin->save();
        return redirect()->back()->with('success', 'Berhasil mengubah foto profil.');
    }
}
