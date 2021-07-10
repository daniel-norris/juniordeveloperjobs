<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\SearchProvider;

class SearchController extends Controller
{
    public function index(): View
    {
        $adverts = DB::table('adverts')->get();

        return view('home', ['adverts' => $adverts]);
    }

    public function search(Request $request, SearchProvider $search): View
    {
        $validated = $request->validate([
            'search' => 'required|max:255',
        ]);

        $results = $search->create($validated);

        return view('home', ['adverts' => $results]);
    }
}
