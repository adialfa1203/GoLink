<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'number' => 'required|min:10|max:15',
            'old_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
        ],[
            'number.min' => 'Nomor tidak boleh kurang dari 10!',
            'number.max' => 'Nomor tidak boleh lebih dari 15!',
            'email.unique' => 'Email sudah pernah digunakan',
            'email.required' => 'Kolom Email harus diisi',
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
            $oldProfilePicture = $user->profile_picture;
            if ($oldProfilePicture) {
                $oldProfilePath = public_path('profile_pictures/' . $oldProfilePicture);
                if (file_exists($oldProfilePath)) {
                    unlink($oldProfilePath);
                }
            }
            dd($request->profile_picture);
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

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'email|unique:users,email,' . $admin->id,
            'number' => 'required|min:10|max:15',
            'old_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
        ],[
            'number.min' => 'Nomor tidak boleh kurang dari 10!',
            'number.max' => 'Nomor tidak boleh lebih dari 15!',
            'email.unique' => 'Email sudah pernah digunakan',
            'email.required' => 'Kolom Email harus diisi',
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
