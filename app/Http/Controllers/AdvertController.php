<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\SearchProvider;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::all();

        return view('main', ['adverts' => $adverts]);
    }

    public function search(Request $request, SearchProvider $search)
    {
        $input = $request->search;

        $results = $search->create($input);

        return view('main', ['adverts' => $results]);
    }
}
