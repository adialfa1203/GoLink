<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function viewKomentar()
    {
        $user = Auth::user()->id;
        $komentar = Comment::orderBy('created_at', 'desc')->paginate(10);
        $d = $komentar;
        return view('Komentar.ViewKomentar', compact('komentar', 'user', 'd'));
    }

    public function create(Request $request, $user) // Menggunakan route model binding untuk mendapatkan objek User
    {
        // Validasi input, pastikan isikomentar ada dan tidak lebih dari 200 karakter
        $request->validate([
            'isikomentar' => 'required|max:200',
        ], [
            'isikomentar.max' => 'Isi komentar harus maksimal :max karakter.',
        ]);

        // Buat objek komentar
        $komentar = new Comment;
        $komentar->user_id = Auth::user()->id; // Menggunakan ID dari objek User yang diberikan melalui route model binding
        $komentar->isikomentar = $request->input('isikomentar');
        $komentar->save();

        return redirect()->back()->with('success', 'Komentar ditambahkan');
    }

    public function blokir()
    {
        $totalUser = User::where('email', '!=', 'milink.idn@gmail.com')->where('is_banned', '!=', '1')->count();
        $totaldiblokir = User::where('is_banned', 1)->count();
        $data = User::where('is_banned', 1)->paginate(10);
        $d = $data;
        return view('Banned.view-banned', compact('data', 'totaldiblokir', 'totalUser', 'd'));
    }
}
