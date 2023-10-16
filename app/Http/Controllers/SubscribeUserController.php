<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeUserController extends Controller
{
    public function subscribeUser()
    {
        $data = Subscribe::paginate(5);
        return view('User.SubscribeUser', compact('data'));
    }

    public function subscribeProductUser()
    {
        $subscribe = Subscribe::orderBy('created_at', 'asc')->get();

        $tripay = new TripayController();

        $channels = $tripay->getPaymentChannels();

        return view('User.SubscribeProductUser', compact('subscribe', 'channels'));
    }

    public function checkout($id){
        $subscribe = Subscribe::findOrFail($id);
        return view('Subscribe.CheckoutProduct', compact('subscribe'));
    }

    public function store(Request $request){
        dd($request->all());

        // $subscribe =

        // $method =

        $tripay = new TripayController();

        $tripay->requestTransaction();
    }
}
