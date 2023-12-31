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

        $ch_messages = ChMessage::where('to_id', $user->id)
        ->where('seen', false)
        ->with(['fromUser' => function ($query) use ($user) {
            $query->where('id', '!=', $user->id);
        }])
        ->with(['toUser' => function ($query) use ($user) {
            $query->where('id', '!=', $user->id);
        }])
        ->groupBy('from_id')
        ->take(3) 
        ->get();

        foreach ($ch_messages as $message) {
            if ($message->fromUser) {
                $message->fromUserName = $message->fromUser->name;
                $message->fromUserId = $message->fromUser->id;
                if ($message->fromUser->profile_picture && file_exists(public_path('profile_pictures/' . $message->fromUser->profile_picture))) {
                    $message->image = asset('profile_pictures/' . $message->fromUser->profile_picture);
                } elseif ($message->fromUser->google_id && $message->fromUser->profile_picture) {
                    $message->image = $message->fromUser->profile_picture;
                } else {
                    $message->image = asset('default/default.jpg');
                }
            }

            if ($message->toUser) {
                $message->toUserName = $message->toUser->name;
                $message->toUserId = $message->toUser->id;
                if ($message->toUser->profile_picture && file_exists(public_path('profile_pictures/' . $message->toUser->profile_picture))) {
                    $message->image = asset('profile_pictures/' . $message->toUser->profile_picture);
                } elseif ($message->toUser->google_id && $message->toUser->profile_picture) {
                    $message->image = $message->toUser->profile_picture;
                } else {
                    $message->image = asset('default/default.jpg');
                }
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

        $ch_messages = ChMessage::where('to_id', $user->id)
        ->where('seen', false)
        ->with(['fromUser' => function ($query) use ($user) {
            $query->where('id', '!=', $user->id);
        }])
        ->with(['toUser' => function ($query) use ($user) {
            $query->where('id', '!=', $user->id);
        }])
        ->groupBy('from_id')
        ->take(3) 
        ->get();

            foreach ($ch_messages as $message) {
                if ($message->fromUser) {
                    $message->fromUserName = $message->fromUser->name;
                    $message->fromUserId = $message->fromUser->id;
                    if ($message->fromUser->profile_picture && file_exists(public_path('profile_pictures/' . $message->fromUser->profile_picture))) {
                        $message->image = asset('profile_pictures/' . $message->fromUser->profile_picture);
                    } elseif ($message->fromUser->google_id && $message->fromUser->profile_picture) {
                        $message->image = $message->fromUser->profile_picture;
                    } else {
                        $message->image = asset('default/default.jpg');
                    }
                }
    
                if ($message->toUser) {
                    $message->toUserName = $message->toUser->name;
                    $message->toUserId = $message->toUser->id;
                    if ($message->toUser->profile_picture && file_exists(public_path('profile_pictures/' . $message->toUser->profile_picture))) {
                        $message->image = asset('profile_pictures/' . $message->toUser->profile_picture);
                    } elseif ($message->toUser->google_id && $message->toUser->profile_picture) {
                        $message->image = $message->toUser->profile_picture;
                    } else {
                        $message->image = asset('default/default.jpg');
                    }
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
