<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\SearchProvider;

class SearchController extends Controller
{
    public function index(SearchProvider $search): View
    {
        $adverts = DB::table('adverts')->get();

        $results = collect();

        $adverts->map(function ($advert) use ($results, $search) {
            $results->push($search->mapResults($advert));
        });

        return view('home', ['adverts' => $results]);
    }

    public function search(Request $request, SearchProvider $search): View
    {
        $validated = $request->validate([
            'search' => 'max:255',
        ]);

        $results = $search->create($validated);

        return view('home', ['adverts' => $results]);
    }
}
