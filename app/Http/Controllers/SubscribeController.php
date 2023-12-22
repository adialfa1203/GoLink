<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function subscribe()
    {
        $subscribe = Subscribe::orderBy('created_at', 'asc')->get();
        return view('SubscribeAdmin.index', compact('subscribe'));
    }
    public function addSubscribe()
    {
        return view('SubscribeAdmin.AddSubscribe');
    }
    public function createSubscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipe' => 'required|in:free,silver,gold,platinum',
            'price' => 'required|numeric|min:0',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|min:10',
        ], [
            'tipe.required' => 'Pilih tipe langganan.',
            'tipe.in' => 'Tipe langganan tidak valid.',
            'price.required' => 'Harga tidak boleh kosong.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak valid.',
            'picture.required' => 'Mohon unggah foto.',
            'picture.image' => 'Berkas yang diunggah harus berupa gambar.',
            'picture.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'picture.max' => 'Ukuran gambar terlalu besar. Maksimal 2MB.',
            'description.required' => 'Deskripsi tidak boleh kosong.',
            'description.min' => 'Deskripsi harus memiliki setidaknya 10 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $subscribeImage = $request->file('picture');
        $subsImageName = time() . '_picture.' . $subscribeImage->getClientOriginalExtension();
        $subscribeImage->move(public_path('pictureSubs'), $subsImageName);

        $subscribe = Subscribe::create([
            'tipe' => $request->tipe,
            'price' => $request->price,
            'picture' => $subsImageName,
            'description' => $request->description,
        ]);

        return redirect()->route('subscribe')->with('success', 'Berhasil membuat tipe Langganan baru.');
    }
    public function editSubscribe(Request $request, $id)
    {
        $subscribe = Subscribe::Findorfail($id);
        return view('SubscribeAdmin.EditSubscription', compact('subscribe'));
    }

    public function updateSubscribe(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tipe' => 'required|in:free,silver,gold,platinum',
            'price' => 'required|numeric|min:0',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|min:10',
            'discount' => 'nullable|numeric|min:0|max:75',
            'type_of_discount' => 'nullable|string'
        ], [
            'tipe.required' => 'Pilih tipe langganan.',
            'tipe.in' => 'Tipe langganan tidak valid.',
            'price.required' => 'Harga tidak boleh kosong.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak valid.',
            'picture.image' => 'Berkas yang diunggah harus berupa gambar.',
            'picture.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'picture.max' => 'Ukuran gambar terlalu besar. Maksimal 2MB.',
            'description.required' => 'Deskripsi tidak boleh kosong.',
            'description.min' => 'Deskripsi harus memiliki setidaknya 10 karakter.',
            'discount.numeric' => 'Diskon harus berupa angka',
            'discount.min' => 'Diskon tidak valid',
            'discount.max' => 'Jumlah diskon tidak boleh lebih dari 75%'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $subscribe = Subscribe::findOrFail($id);

        if ($request->hasFile('picture')) {
            $subscribeImage = $request->file('picture');
            $subsImageName = time() . '_picture.' . $subscribeImage->getClientOriginalExtension();
            $subscribeImage->move(public_path('pictureSubs'), $subsImageName);
            $subscribe->picture = $subsImageName;
        }

        $subscribe->starting_price = $subscribe->price; 
        $subscribe->tipe = $request->tipe;
        $subscribe->price = $request->price - ($request->price * ($request->discount / 100));
        $subscribe->discount = $request->discount;
        $subscribe->description = $request->description;
        $subscribe->type_of_discount = $request->type_of_discount;

        $previousTotalDiscount = $subscribe->total_discount;

        $newTotalDiscount = $previousTotalDiscount + $request->discount;
        $subscribe->total_discount = $newTotalDiscount;

        // $discountedPrice = $request->price - ($request->price * ($request->discount / 100));

        // $subscribe->discounted_price = $discountedPrice;

        $subscribe->save();

        return redirect()->route('subscribe')->with('success', 'Berhasil memperbarui tipe Langganan.');
    }

    public function deleteSubscribe($id)
    {
        $subscribe = Subscribe::findOrFail($id);

        $picturePath = public_path('pictureSubs/' . $subscribe->picture);

        if (file_exists($picturePath) && is_file($picturePath)) {
            unlink($picturePath);
        }

        $subscribe->delete();

        return redirect()->back()->with('success', 'Langganan berhasil dihapus.');
    }    
}
