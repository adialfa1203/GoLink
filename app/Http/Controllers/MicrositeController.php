<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Button;
use App\Models\Social;
use App\Models\ShortUrl;
use App\Models\Microsite;
use App\Models\Components;
use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class MicrositeController extends Controller
{
    public function microsite(Request $request )
    {
        $user_id = auth()->user()->id;
        $microsite_uuid = 'fb2ee8d9-d618-4578-8f34-84cac949cf0b';
        // dd($user_id);
        $qr = ShortUrl::where('microsite_uuid',$microsite_uuid)->get();

        if ($request->has('filter') && $request->filter == 'terakhir_diperbarui') {
            $data = Microsite::where('user_id', $user_id)
                ->orderBy('updated_at', 'desc')
                ->paginate(5);
            $d = $data;
        }
        else {
            $data = Microsite::whereHas('shortUrl')
            ->where('user_id', $user_id)
            ->with('shortUrl')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
            $d = $data;
        }

        $urlshort = ShortUrl::withCount('visits')
        ->where('user_id', $user_id)
        ->orderBy('created_at', 'desc')
            ->get();
            $result = [
                'labels' => DateHelper::getAllMonths(5),
                'series' => []
            ];


            $startDate = DateHelper::getSomeMonthsAgoFromNow(5)->format('Y-m-d H:i:s');
            $endDate = DateHelper::getCurrentTimestamp('Y-m-d H:i:s');

            $template = [0,0,0,0,0];

            foreach ($urlshort as $i => $data) {
                $parse = Carbon::parse($data->created_at);
                $date = $parse->shortMonthName . ' ' . $parse->year;
                $index = array_search($date, array_values($result['labels']));
                $visits = $template;
                $visits[4] = (int)$data->visits_count;
                $result['series'][$i] = $visits;
            }

        $short_urls = ShortUrl::whereIn('microsite_uuid', $data->pluck('id'))->get();

        // dd($urlshort, $d);
        return view('Microsite.MicrositeUser', compact('data', 'urlshort', 'short_urls','result', 'd','qr','user_id'));
    }

    public function addMicrosite(Request $request)
    {
        $user = auth()->user();
        $statusSubscribe = $user->subscribe;

        if ($statusSubscribe === 'yes') {
            $data = Components::all();
        } else {
            $data = Components::orderBy('created_at', 'asc')->take(3)->get();
        }

        $button = Button::all();
        $micrositeCount = $user->microsites()->count();
        return view('Microsite.AddMicrosite', compact('data', 'button', 'micrositeCount'));
    }


    public function createMicrosite(Request $request, Microsite $microsite)
    {
        $user = auth()->user();
        if ($user->subscribe === 'no' && $user->microsites()->count() >= 3) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'microsite_selection' => 'required',
            'name' => 'required|string|regex:/^[^+\/]+$/u|max:35',
            'link_microsite' => 'required|regex:/^[^+\/]+$/u|unique:microsites,link_microsite,id',
        ],[
            'name.max' => 'Nama Microsite tidak boleh lebih dari 35 karakter',
            'name.max' => 'Nama microsite tidak valid atau mengandung kata terlarang!',
            'link_microsite.required' => 'Link microsite harus diisi!',
            'link_microsite.regex' => 'Link microsite tidak valid atau mengandung kata terlarang!'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $link = $request->link_microsite;
        $micrositeStr = str_replace(' ', '-', $link);
        $data = [
            'components_uuid' => $request->microsite_selection,
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'link_microsite' => $micrositeStr,
        ];

        $selectedComponentId = $request->input('microsite_selection');
        $selectedButtons = $request->input('selectedButtons', []);

        $microsite = Microsite::create($data);
        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
        $micrositeObject = $builder->destinationUrl(route('microsite.short.link', str_replace(' ', '-', $microsite->link_microsite)))->make();

        ShortUrl::where('url_key', $micrositeObject->url_key)->update([
            'user_id' => auth()->id(),
            'microsite_uuid' => $microsite->id,
        ]);
        $short_id = ShortUrl::where('url_key', $micrositeObject->url_key)->first()->id;
        $link_microsite = str_replace(' ', '-', $request->link_microsite);
        ShortUrl::findOrFail($short_id)->update([
            'url_key' => $link_microsite,
            'default_short_url' =>  env('APP_URL') . "/". $link_microsite,
        ]);


        foreach ($selectedButtons as $select) {
            $socialData = [
                'buttons_uuid' => $select,
                'microsite_uuid' => $microsite->id,
                'button_link' => null,
            ];
            Social::create($socialData);
        }
        // dd($request);

        return redirect()->route('edit.microsite', ['id' => $microsite->id])->with('success', 'Microsite berhasil dibuat');
    }

    public function editMicrosite($id)
    {
        $microsite = Microsite::findorFail($id);
        $social = Social::where('microsite_uuid', $id)->get();
        $short_url = ShortUrl::where('microsite_uuid', $id)->first();
        // $buttonLink = ButtonLink::findorFail($id);
        return view('Microsite.EditMicrosite', compact('microsite', 'id', 'social', 'short_url'));
    }

    public function micrositeUpdate(Request $request, $id)
    {
        $microsite = Microsite::findOrFail($id);
        $socials = Social::where('microsite_uuid', $id)->get();
        $buttonLinks = $request->input('button_link');

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:35',
            'name_microsite' => 'nullable|string|max:35',
            'description' => 'nullable|string|max:300',
            'company_name' => 'required|string|max:35', // Menghapus 'nullable'
            'company_address' => 'required|string|max:100', // Menghapus 'nullable'
            'button_link.*' => 'required|string|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'name_microsite' => 'Kolom nama microsite tidak boleh lebih besar dari 35 karakter.',
            'description' => 'Deskripsi tidak boleh lebih besar dari 300 karakter.',
            'image.image' => 'Kolom harus berupa gambar!',
            'button_link.*.required' => 'Kolom ini wajib diisi!',
            'button_link.*.url' => 'URL tidak valid.',
            'company_name.required' => 'Nama perusahaan wajib diisi!', // Menambah pesan validasi baru
            'company_name.max' => 'Nama perusahaan tidak boleh lebih besar dari 35 karakter.', // Memindahkan pesan validasi max ke sini
            'company_address.required' => 'Alamat perusahaan wajib diisi!', // Menambah pesan validasi baru
            'company_address.max' => 'Alamat perusahaan tidak boleh lebih besar dari 100 karakter.', // Memindahkan pesan validasi max ke sini
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Kesalahan, ada kolom yang belum terisi dengan benar!');
        }

        if ($request->has('name')) {
            $microsite->name = $request->input('name');
        }
        if ($request->has('name_microsite')) {
            $microsite->name_microsite = $request->input('name_microsite');
        }
        if ($request->has('description')) {
            $microsite->description = $request->input('description');
        }
        if ($request->has('company_name')) {
            $microsite->company_name = $request->input('company_name');
        }
        if ($request->has('company_address')) {
            $microsite->company_address = $request->input('company_address');
        }

        if ($request->hasFile('image')) {
            $coverImage = $request->file('image');
            $coverImageName = time() . '_image.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('images'), $coverImageName);
            $microsite->image = $coverImageName;
        }
        // dd($microsite->image);
        $microsite->save();

        foreach ($buttonLinks as $index => $buttonLink) {
            if ($buttonLink !== null) {
                $social = $socials->where('buttons_uuid', $index)->first();

                if ($social) {
                    $social->button_link = $buttonLink;
                    $social->save();
                }
            }
        }

        return redirect()->route('microsite')->with('success', 'Microsite berhasil dibuat');
    }

    public function createComponent()
    {
        return view('Microsite.CreateComponent');
    }

    public function saveComponent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'component_name' => 'required|string|max:20',
            'cover_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ],[
            'component_name.required' => 'Nama wajib diisi',
            'component_name.max' => 'Tidak boleh lebih besar dari 20 karakter',
            'cover_img' => 'Kolom gambar sampul harus berupa gambar.
'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $coverImage = $request->file('cover_img');
        $profileImage = $request->file('profile_img');

        $coverImageName = time() . '_cover.' . $coverImage->getClientOriginalExtension();
        $coverImage->move(public_path('component'), $coverImageName);

        // $profileImageName = time() . '_profile.' . $profileImage->getClientOriginalExtension();
        // $profileImage->move(public_path('component'), $profileImageName);

        $component = Components::create([
            'component_name' => $request->component_name,
            'cover_img' => $coverImageName,
            // 'profile_img' => $profileImageName,
        ]);
        return redirect()->route('view.component')->with('success', 'Komponen berhasil disimpan.');
    }

    public function editComponent($id)
    {
        $component = Components::findOrFail($id);
        return view('Microsite.UpdateComponent', compact('component'));
    }

    public function updateComponent(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'component_name' => 'required|max:20',
            'cover_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'profile_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'component_name.required' => 'Nama komponen harus diisi',
            'component_name.max' => 'Jumlah karakter tidak boleh lebih dari 20',
            'cover_img.image' => 'Data yang diizinkan hanya jpeg, png, jpg dan gif',
            'cover_img.mimes' => 'Data yang diizinkan hanya jpeg, png, jpg dan gif',
            'cover_img.max' => 'Ukuran background tidak boleh lebih dari 2048 pixel',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $component = Components::findOrFail($id);

        $micrositeCount = Microsite::where('components_uuid', $id)->count();

        if ($micrositeCount > 0) {
            return redirect()->route('view.component')->with('error', 'Tidak dapat mengedit komponen ini karena masih ada data terkait.');
        }

        if ($request->hasFile('cover_img')) {
            if (file_exists(public_path('component/' . $component->cover_img))) {
                unlink(public_path('component/' . $component->cover_img));
            }

            $coverImage = $request->file('cover_img');
            $coverImageName = time() . '_cover.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('component'), $coverImageName);
            $component->cover_img = $coverImageName;
        }

        if ($request->hasFile('profile_img')) {
            if (file_exists(public_path('component/' . $component->profile_img))) {
                unlink(public_path('component/' . $component->profile_img));
            }

            $profileImage = $request->file('profile_img');
            $profileImageName = time() . '_profile.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('component'), $profileImageName);
            $component->profile_img = $profileImageName;
        }

        $component->component_name = $request->component_name;
        $component->save();

        return redirect()->route('view.component')->with('success', 'Komponen berhasil di edit.');
    }

    public function deleteComponent($id)
    {
        $component = Components::findOrFail($id);

        $micrositeCount = Microsite::where('components_uuid', $id)->count();

        if ($micrositeCount > 0) {
            // return redirect()->back();
            return redirect()->back()->with('error', 'Tidak dapat menghapus komponen ini karena data masih digunakan.');
        }

        if (file_exists(public_path('component/' . $component->cover_img))) {
            unlink(public_path('component/' . $component->cover_img));
        }
        // if (file_exists(public_path('component/' . $component->profile_img))) {
        //     unlink(public_path('component/' . $component->profile_img));
        // }
        $component->delete();

        return redirect()->back()->with('success', 'Komponen berhasil dihapus.');
    }


    public function viewComponent()
    {
        $component = Components::paginate(6);
        return view('Microsite.ViewComponent', compact('component'));
    }

    public function search(Request $request)
    {
        $query = $request->input('name');
        $results = Microsite::where('field', 'like', '%' . $query . '%')->get();

        return response()->json(['results' => $results]);
    }


}
