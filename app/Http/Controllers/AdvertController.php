<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\SearchProvider;
use App\Http\Requests\SearchProviderRequest;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function index()
    {
        $adverts = Advert::all();

        return view('main', ['adverts' => $adverts]);
    }

    public function search(SearchProviderRequest $request, SearchProvider $search)
    {
        $input = $request->validated();
        $input = $input['search'];

        $results = $search->create($input);

        return view('main', ['adverts' => $results]);
    }
}
