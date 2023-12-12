<?php

namespace App\Http\Controllers;

use App\Models\Button;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ButtonController extends Controller
{
    public function viewButton()
    {
        $button = Button::whereNull('microsite_uuid')->paginate(12);
        return view('Button.ViewButton', compact('button'));
    }

    public function createButton()
    {
        return view('Button.CreateButton');
    }

    public function saveButton(Request $request)
    {
        $validatedData = $request->validate([
            'name_button' => 'required|string|max:255',
            'icon' => [
                'required',
                Rule::in(['bi bi-whatsapp', 'bi bi-facebook', 'bi bi-twitter', 'bi bi-telephone-fill', 'bi bi-instagram', 'bi bi-linkedin', 'bi bi-telegram', 'bi bi-tiktok', 'bi bi-spotify', 'bi bi-youtube', 'bi bi-bag-fill']),
            ],
            'color_hex' => 'nullable|string|max:7',
        ], [
            'name_button.required' => 'Nama button sosial wajib diisi',

        ]);
        $existingButton = Button::where('icon', $request->icon)->first();

        if ($existingButton) {
            return redirect()->back()->with('error', 'Pilihan dengan ikon ini sudah ada.');
        }

        $button = Button::create([
            'name_button' => str_replace(' ', '', $request->name_button),
            'icon' => $request->icon,
        ]);
        return redirect()->route('view.button')->with('success', 'Media Sosial berhasil ditambah.');
    }

    public function customBtnSave(Request $request)
    {
        $validatedData = $request->validate([
            'name_button' => 'required|string|max:255',
            'icon' => [
                'nullable',
                Rule::in(['bi bi-whatsapp', 'bi bi-facebook', 'bi bi-twitter', 'bi bi-telephone-fill', 'bi bi-instagram', 'bi bi-linkedin', 'bi bi-telegram', 'bi bi-tiktok', 'bi bi-spotify', 'bi bi-youtube', 'bi bi-bag-fill']),
            ],
            'color_hex' => 'nullable|string|max:7',
        ], [
            'name_button.required' => 'Nama button sosial wajib diisi',
        ]);

        $micrositeUuid = $request->input('microsite_uuid');
        $userId = $request->input('user_id');

        $button = Button::create([
            'name_button' => str_replace(' ', '', $request->name_button),
            'icon' => $request->icon,
            'microsite_uuid' => $micrositeUuid,
            'user_id' => $userId,
            'color_hex' => $request->color_hex,
        ]);

        $social = Social::create([
            'microsite_uuid' => $micrositeUuid,
            'buttons_uuid' => $button->id,
        ]);
        // dd($button);

        return redirect()->back()->with('success', 'Media Sosial berhasil ditambah.');
    }


    public function customButton(Request $request)
    {
    }

    public function editButton($id)
    {
        $button = Button::find($id);
        return view('Button.UpdateButton', compact('button'));
    }

    public function updateButton(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_button' => 'required|string|max:255',
            'icon' => [
                'required',
                Rule::in(['bi bi-whatsapp', 'bi bi-facebook', 'bi bi-twitter', 'bi bi-telephone-fill', 'bi bi-instagram', 'bi bi-linkedin', 'bi bi-telegram', 'bi bi-tiktok', 'bi bi-spotify', 'bi bi-youtube', 'bi bi-bag-fill']),
            ],
        ]);

        $existingButton = Button::where('icon', $request->icon)->where('id', '<>', $id)->first();

        if ($existingButton) {
            return redirect()->back()->with('error', 'Pilihan dengan ikon ini sudah ada.');
        }

        $button = Button::findOrFail($id);

        $button->name_button = str_replace(' ', '', $request->name_button);
        $button->icon = $request->icon;
        $socialCount = Social::where('buttons_uuid', $id)->count();

        if ($socialCount > 0) {
            return redirect()->route('view.button')->with('error', 'Tidak dapat mengedit Media Sosial ini karena masih ada data terkait.');
        }

        $button->save();

        return redirect()->route('view.button')->with('success', 'Media Sosial berhasil diedit.');
    }

    public function deleteButton($id)
    {
        $button = Button::findOrFail($id);
        $socialCount = Social::where('buttons_uuid', $id)->count();

        if ($socialCount > 0) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus Media Sosial ini karena masih ada data terkait.');
        }

        $button->delete();

        return redirect()->route('view.button')->with('success', 'Media Sosial sukses dihapus.');
    }

    public function deleteButtonsByMicrosite($id)
    {
        Button::query()->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Media Sosial sukses dihapus.');
    }

    public function saveButtonSocial(Request $request)
    {
        $micrositeUuid = $request->input('microsite_uuid');
        $buttonsUuid = $request->input('button_uuid');

        $social = Social::create([
            'microsite_uuid' => $micrositeUuid,
            'buttons_uuid' => $buttonsUuid,
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
