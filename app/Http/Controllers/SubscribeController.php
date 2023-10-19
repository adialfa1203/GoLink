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
            'period' => 'required|in:forever,1_week,1_month,1_year',
            'price' => 'required|numeric|min:0',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|min:10',
        ], [
            'tipe.required' => 'Pilih tipe langganan.',
            'tipe.in' => 'Tipe langganan tidak valid.',
            'period.required' => 'Pilih masa periode.',
            'period.in' => 'Masa periode tidak valid.',
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
            'period' => $request->period,
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
            'period' => 'required|in:forever,1_week,1_month,1_year',
            'price' => 'required|numeric|min:0',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|min:10',
        ], [
            'tipe.required' => 'Pilih tipe langganan.',
            'tipe.in' => 'Tipe langganan tidak valid.',
            'period.required' => 'Pilih masa periode.',
            'period.in' => 'Masa periode tidak valid.',
            'price.required' => 'Harga tidak boleh kosong.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak valid.',
            'picture.image' => 'Berkas yang diunggah harus berupa gambar.',
            'picture.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'picture.max' => 'Ukuran gambar terlalu besar. Maksimal 2MB.',
            'description.required' => 'Deskripsi tidak boleh kosong.',
            'description.min' => 'Deskripsi harus memiliki setidaknya 10 karakter.',
        ]);
        // dd($request->tipe);

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

        $subscribe->tipe = $request->tipe;
        $subscribe->period = $request->period;
        $subscribe->price = $request->price;
        $subscribe->description = $request->description;

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
