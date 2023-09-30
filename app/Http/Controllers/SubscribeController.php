<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe()
    {
        return view('SubscribeAdmin.index');
    }
    public function addSubscribe()
    {
        return view('SubscribeAdmin.AddSubscribe');
    }
}
