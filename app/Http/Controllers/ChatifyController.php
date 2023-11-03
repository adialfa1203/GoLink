<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatifyController extends Controller
{
    public function setAllMessagesSeen()
    {
        $userId = Auth::id();
        ChMessage::where('to_id', $userId)
            ->update(['seen' => true]);
        return redirect()->back()->with('success', 'Pesan sudah dibaca semua');
    }
    public function setAllMessagesSeenAdmin()
    {
        $userId = Auth::id();
        ChMessage::where('to_id', $userId)
            ->update(['seen' => true]);
        return redirect()->back()->with('success', 'Pesan sudah dibaca semua');
    }
}
