<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Services\SearchProvider;
use App\Http\Requests\SearchProviderRequest;

class AdvertController extends Controller
{
    public function index()
    {
        $data = Company::all()->load(['recruiters', 'adverts']);

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

        $results = $search->create($input);

        return view('main', ['data' => $results]);
    }
}
