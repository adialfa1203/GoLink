<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $user = User::findOrFail(Auth::user()->id);

        // Section 1: Update Name, Email, and Phone Number
        $validator = Validator::make($request->only('name', 'email', 'number'), [
            'name' => 'required|max:50',
            'email' => 'required|min:11|regex:/^[A-Za-z0-9_.-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/|unique:users,email,' . $user->id,
            'number' => 'required|min:10|max:13|regex:regex:/^[^-+]+$/u',
        ], [
            'name.max' => 'Nama tidak boleh lebih dari 50 huruf!',
            'number.required' => 'Kolom Nomer harus diisi',
            'number.regex' => 'Nomor yang dimasukkan tidak valid!',
            'number.min' => 'Nomor tidak boleh kurang dari 10!',
            'email.unique' => 'Email sudah pernah digunakan',
            'email.required' => 'Kolom Email harus diisi',
            'email.regex' => 'Format alamat email tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;

        // Section 2: Update Password
        if ($request->filled('old_password') && $request->filled('new_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Kata sandi lama tidak cocok.']);
            }

            $validator = Validator::make($request->only('new_password', 'new_password_confirmation'), [
                'new_password' => 'min:8|confirmed',
            ], [
                'new_password.min' => 'Password baru harus memiliki panjang minimal 8 karakter.',
                'new_password.confirmed' => 'Konfirmasi password baru tidak cocok dengan password baru.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user->password = Hash::make($request->new_password);
        }

        // Section 3: Update Profile Picture
        if ($request->hasFile('profile_picture')) {
            $coverImage = $request->file('profile_picture');

            // Validate file as image
            if (!$coverImage->isValid() || !in_array($coverImage->getClientMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                return redirect()->back()->withErrors(['profile_picture' => 'Kolom ini harus berisi gambar dengan format yang sesuai (JPEG, PNG, JPG).']);
            }

            // Delete old profile picture
            if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                unlink(public_path('profile_pictures/' . $user->profile_picture));
            }

            $coverImageName = time() . '_cover.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('profile_pictures'), $coverImageName);
            $user->profile_picture = $coverImageName;
        }

        $user->save();

        return redirect()->back()->with('success', 'Berhasil mengubah status profil.');
    }

    public function profileAdmin()
    {
        $admin = Auth::user();
        if ($admin) {
            $subscribe = $admin->subscribe;

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
        return view('Admin.ProfilAdmin', compact('admin', 'accountStatus'));
    }

    public function updateAdmin(Request $request)
    {
        $admin = User::findOrFail(Auth::user()->id);

        $rules = [
            'name' => 'required|max:50',
            'email' => [
                'required',
                'min:11',
                'regex:/^[A-Za-z0-9_.-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',
                Rule::unique('users', 'email')->ignore($admin->id),
            ],
            'number' => 'required|min:10|max:13|regex:regex:/^[^-+]+$/u',
            'new_password' => 'nullable|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
        ];

        $messages = [
            'name.max' => 'Nama tidak boleh lebih dari 50 huruf!',
            'number.required' => 'Kolom Nomer harus diisi',
            'number.min' => 'Nomor tidak boleh kurang dari 10!',
            'number.regex' => 'Nomor yang dimasukkan tidak valid!',
            'email.unique' => 'Email sudah pernah digunakan',
            'email.required' => 'Kolom Email harus diisi',
            'email.regex' => 'Format alamat email tidak valid.',
            'old_password.required' => 'Kolom Password Lama harus diisi jika Anda ingin mengubah password.',
            'new_password.min' => 'Password baru harus memiliki panjang minimal 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok dengan password baru.',
            'profile_picture.image' => 'Kolom ini harus berisi gambar dengan format yang sesuai (jpeg, png, jpg).',
            'profile_picture.mimes' => 'Kolom ini harus berisi gambar dengan format yang sesuai (jpeg, png, jpg).',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update Name, Email, and Phone Number
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->number = $request->number;

        // Update Password
        if ($request->filled('new_password')) {
            if (!Hash::check($request->old_password, $admin->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Kata sandi lama tidak cocok.']);
            }
            $admin->password = Hash::make($request->new_password);
        }

        // Update Profile Picture
        if ($request->hasFile('profile_picture')) {

            // Validate file as image
            if (!$coverImage->isValid() || !in_array($coverImage->getClientMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                return redirect()->back()->withErrors(['profile_picture' => 'Kolom ini harus berisi gambar dengan format yang sesuai (JPEG, PNG, JPG).']);
            }

            // Delete old profile picture
            if ($admin->profile_picture && file_exists(public_path('profile_pictures/' . $admin->profile_picture))) {
                unlink(public_path('profile_pictures/' . $admin->profile_picture));
            }

            $coverImage = $request->file('profile_picture');
            $coverImageName = time() . '_cover.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('profile_pictures'), $coverImageName);
            $admin->profile_picture = $coverImageName;
        }

        $admin->save();

        return redirect()->back()->with('success', 'Berhasil mengubah foto profil.');
    }
}
