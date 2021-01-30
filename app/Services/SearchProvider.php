<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SearchProvider extends Model
{
    public function create(?string $input)
    {
        $input = '%' . $input . '%';

        if (empty($input)) {
            $results = DB::table('adverts')->get();
            return $results;
        }
        
        $results = DB::table('adverts')
                        ->where('title', 'like', $input)
                        ->orWhere('description', 'like', $input)
                        ->orWhere('address_1', 'like', $input)
                        ->orWhere('address_2', 'like', $input)
                        ->orWhere('city', 'like', $input)
                        ->orWhere('region', 'like', $input)
                        ->orWhere('country', 'like', $input)
                        ->orWhere('postcode', 'like', $input)
                        ->get();

        return $results;
    }
}
