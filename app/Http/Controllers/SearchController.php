<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(): View
    {
        $adverts = DB::table('adverts')->get();

        return view('home', ['adverts' => $adverts]);
    }
}
