<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Microsite;


class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');

    // Lakukan query pencarian berdasarkan 'name' pada model Anda
    $results = Microsite::where('name', 'like', '%' . $query . '%')->get();

    return response()->json(['results' => $results]);
}

}
