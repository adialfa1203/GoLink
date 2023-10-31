<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function notificationShow()
    {
        $user = Auth::user();

        $ch_messages = ChMessage::where(function ($query) use ($user) {
            $query->where('from_id', '!=', $user->id)
                ->orWhere('to_id', $user->id);
        })
            ->where('seen', false)
            ->with('fromUser', 'toUser')
            ->get();

        foreach ($ch_messages as $message) {
            if ($message->fromUser && $message->from_id != $user->id) {
                $message->fromUserName = $message->fromUser->name;
                $message->image = $message->fromUser->profile_picture; 
            }

            if ($message->toUser && $message->to_id != $user->id) {
                $message->toUserName = $message->toUser->name;
                $message->image = $message->toUser->profile_picture;
            }
        }

        // dd($ch_messages);

        $numberOfSenders = ChMessage::where('to_id', $user->id)
            ->where('seen', false)
            ->distinct()
            ->count('from_id');

        return response()->json([
            'user' => $user,
            'ch_messages' => $ch_messages,
            'number_of_senders' => $numberOfSenders
        ]);
    }
}
