<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\User;



class CommentController extends Controller
{
    public function viewKomentar(){
        $komentar = Comment::all();
        $user = Auth::user()->id;
        return view('Komentar.ViewKomentar', compact('komentar','user'));
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
        $komentar->user_id = $user; // Menggunakan ID dari objek User yang diberikan melalui route model binding
        $komentar->isikomentar = $request->input('isikomentar');
        $komentar->save();
    
        return redirect()->back()->with('success', 'Komentar ditambahkan');
    }    

    public function blokir(){
        $totalUser = User::where('email', '!=', 'admin@gmail.com')->where('is_banned', '!=', '1')->count();
        $totaldiblokir = User::where('is_banned', 1)->count();
        $data = User::where('is_banned', 1)->get();
        return view('Banned.view-banned', compact('data', 'totaldiblokir', 'totalUser'));
    }
    public function banned(Request $request, $id)
    {
        $ids = $request->ids;
        $data = User::where('id', $id)->update([
            'is_banned' => 1,
            'pesan' => $request->pesan,
        ]);
        return redirect('/selected-banned')->with('success', 'Promo Berhasi Ditolak');
    }
}
