<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserdataController extends Controller
{
    public function index(){
        $data = User::all();
        return view('UserdataAdmin', compact('data'));
    }
}
