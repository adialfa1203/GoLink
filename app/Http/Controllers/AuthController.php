<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SampleMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;
use Ramsey\Uuid\Uuid;
use App\Models\ChFavorite;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('Auth.Login');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember_me') ? true : false;

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|regex:/^[^-+]+$/u|exists:users,email',
            'password' => 'required|string|min:5',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus memiliki format yang valid.',
            'email.exists' => 'Email belum terdaftar.',
            'email.regex' => 'Email tidak boleh mengandung simbol',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Kata sandi harus memiliki panjang minimal 5 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            $today = Carbon::now();

                if ($user->subscription_end_date && $user->subscription_end_date < $today) {
                    if ($user->subscribe == 'silver' || $user->subscribe == 'gold' || $user->subscribe == 'platinum') {
                        $user->update(['subscribe' => 'free']);
                    }
            }

            if ($user->hasRole('admin')) {
                return redirect()->route('dashboard.admin');
            } elseif ($user->hasRole('user')) {
                if ($user->is_banned) {
                    Auth::logout();
                    return redirect('id/login')->with('error', 'Akun Anda telah dibanned. Silakan hubungi admin untuk informasi lebih lanjut.');
                } else {
                    return redirect()->route('dashboard.user')->withCookie(cookie('remember_web', true, 3));
                }
            }
        }

        return redirect()->route('login')->with('error', 'Email atau Password Yang Anda Masukkan Salah');
    }

    private function checkSubscriptions()
    {
        $user = Auth::user();
        $today = Carbon::now();

            if ($user->subscription_end_date && $user->subscription_end_date < $today) {
                if ($user->status == 'silver' || $user->status == 'gold' || $user->status == 'platinum') {
                    $user->update(['status' => 'free']);
                }
        }
        return response()->json(['message' => 'Pemeriksaan langganan berhasil dijalankan.']);
    }

    public function register()
    {
        return view('Auth.Register');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50|regex:/^[^-+]+$/u',
            'email' => 'required|email|regex:/^[A-Za-z0-9_.-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/|unique:users,email',
            'number' => 'required|max:15|regex:/^[^-+]+$/u|min:11',
            'remember' => 'required|string',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password',
        ], [
            'name.required' => 'Nama Lengkap tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.regex' => 'Format alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'number.required' => 'Nomor tidak boleh kosong',
            'number' => 'Nomor tidak boleh kurang dari 11 dan tidak boleh lebih dari 15!',
            'number.regex' => 'Nomor wajib angka',
            'password_confirmation.same' => 'Password dan Konfirmasi Password tidak cocok.',
            'email.unique' => 'Email sudah terdaftar, silahkan gunakan email lain.',
            'remember.required' => 'Anda harus menyetujui Kebijakan Privasi.',
            'password.required' => 'Kata sandi tidak boleh kosong',
            'password.min' => 'Kata sandi minimal terdiri dari 8 karakter.',
            'password_confirmation' => 'required_with:password|same:password',
            'password_confirmation.required_with' => 'Konfirmasi kata sandi diperlukan ketika kata sandi diisi.',
            'password_confirmation.same' => 'Konfirmasi kata sandi harus sama dengan kata sandi.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            'profile_picture' => $request->profile_picture,
        ]);

        if (!Role::where('name', 'user')->exists()) {
            Role::create(['name' => 'user', 'guard_name' => 'web']);
        }

        $roleUser = Role::where('name', 'user')->first();

        if ($roleUser) {
            $user->assignRole($roleUser);
        }

        if ($user) {
            $favorite = new ChFavorite();
            $favorite->id = Uuid::uuid4()->toString();
            $favorite->user_id = $user->id;
            $favorite->favorite_id = 1;
            $favorite->save();
        }

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login untuk mulai menggunakan akun Anda.');
    }

    public function sendEmail()
    {
        return view('Auth.ForgotPassword.SendEmail');
    }

    public function sendSampleEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ], [
            'email.required' => 'Email tidak boleh kosong',
        ]);

        // Lakukan logika pengiriman email jika validasi berhasil.

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate random verification code
            $verificationCode = mt_rand(100000, 999999);

            // Save the verification code in the user's database record
            $user->verification_code = $verificationCode;
            $user->save();

            // Send the verification code email
            $details = (object) [
                'name' => $user->name,
                'verificationCode' => $verificationCode,
            ];

            Mail::to($user->email)->send(new SampleMail($details));
            return redirect()->route('verification')->with('success', 'Kode berhasil dikirim');
        } else {
            return back()->withErrors(['email' => 'Email tidak terdaftar']);
        }
    }

    public function verification()
    {
        return view('Auth.ForgotPassword.VerificationCode');
    }
    public function verificationCode(Request $request)
    {
        $this->validate($request, [
            'verification_code' => 'required|digits:6',
        ], [
            'verification_code.required' => 'Kode verifikasi harus diisi',
            'verification_code.digits' => 'Kode verifikasi harus terdiri dari 6 angka',
        ]);

        $user = User::where('verification_code', $request->verification_code)
            ->first();
        // dd($user);

        if ($user) {
            return redirect()->route('changePassword', ['email' => $user->email]);
        } else {
            return back()->withErrors(['verification_code' => 'Kode verifikasi salah']);
        }
    }

    public function changePassword($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('verification')->withErrors(['email' => 'Email tidak valid']);
        }

        return view('Auth.ForgotPassword.ChangePassword', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required_with:password|same:password',
        ], [
            'password.required' => 'Kata sandi harus diisi',
            'password.min' => 'Kata sandi minimal terdiri dari 8 karakter',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok',
            'password_confirmation.required_with' => 'Konfirmasi kata sandi harus diisi',
            'password_confirmation.same' => 'Kata sandi dan Konfirmasi Kata sandi tidak cocok',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Verifikasi kode atau email tidak valid']);
        }

        $user->password = Hash::make($request->password);
        $user->verification_code = null; // Clear verification code
        $user->save();
        return redirect()->route('login')->with('success', 'Kata sandi berhasil diubah. Silahkan login.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing.page');
    }

    public function registerWith()
    {
        // Ambil data pengguna yang berhasil login melalui GitHub
        $githubUser = Socialite::driver('github')->user();

        // Ambil alamat email dari data pengguna GitHub
        $email = $githubUser->email;

        // Cari pengguna dengan alamat email yang sesuai
        $user = User::where('email', $email)->first();

        if (!$user) {
            // Pengguna tidak ditemukan, kembalikan pesan kesalahan
            return redirect()->route('login')->withErrors('Terjadi Kesalahan');
        }

        // Lanjutkan ke halaman "confirmation" jika pengguna ditemukan
        return view('Auth.RegisterWith.with');
    }
    // public function noInternet(){
    //     return view('Auth.NoConnection');
    // }
}
