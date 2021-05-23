<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Services\SearchProvider;
use App\Http\Requests\SearchProviderRequest;
use App\Models\Advert;

class AdvertController extends Controller
{
    public function index()
    {
        $data = Advert::all();

        return view('main', ['data' => $data]);
    }

    public function post()
    {
        return view('post');
    }

    public function search(SearchProviderRequest $request, SearchProvider $search)
    {
        $input = $request->validated();
        $input = $input['search'];

        $data = $search->create($input);

        return view('main', ['data' => $data]);
    }
}
