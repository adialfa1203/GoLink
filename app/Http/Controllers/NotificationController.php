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
            $query->where('to_id', $user->id);
        })
            ->where('seen', false)
            ->with(['fromUser' => function ($query) use ($user) {
                $query->where('id', '!=', $user->id);
            }])
            ->with(['toUser' => function ($query) use ($user) {
                $query->where('id', '!=', $user->id);
            }])
            ->get();

        foreach ($ch_messages as $message) {
            if ($message->fromUser) {
                $message->fromUserName = $message->fromUser->name;
                $message->image = $message->fromUser->profile_picture;
            }

            if ($message->toUser) {
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
    public function notificationShowAdmin()
    {
        $user = Auth::user();

        $ch_messages = ChMessage::where(function ($query) use ($user) {
            $query->where('to_id', $user->id);
        })
            ->where('seen', false)
            ->with(['fromUser' => function ($query) use ($user) {
                $query->where('id', '!=', $user->id);
            }])
            ->with(['toUser' => function ($query) use ($user) {
                $query->where('id', '!=', $user->id);
            }])
            ->get();

        foreach ($ch_messages as $message) {
            if ($message->fromUser) {
                $message->fromUserName = $message->fromUser->name;
                if ($message->google_id){
                    $message->image = $message->fromUser->profile_picture;
                } else {
                    $message->image = public_path('profile_pictures/'. $message->fromUser->profile_picture);
                }
            }

            if ($message->toUser) {
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
