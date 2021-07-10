<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SearchProvider
{
    public function create(array $input): Collection
    {
        $results = collect();

        if (empty($input)) {
            return DB::table('adverts')->get();
        }

        $input = '%' . $input['search'] . '%';

        $this->getCompanies($input)->map(function ($advert) use ($results) {
            $results->push($advert);
        });

        $this->getAdverts($input)->map(function ($advert) use ($results) {
            $results->push($advert);
        });

        return $results;
    }

    public function getCompanies(string $input): Collection
    {        
        $companies = DB::table('companies')
            ->where('name', 'like', $input)
            ->orWhere('registered_name', 'like', $input)
            ->orWhere('address_1', 'like', $input)
            ->orWhere('address_2', 'like', $input)
            ->orWhere('city', 'like', $input)

            ->orWhere('region', 'like', $input)
            ->orWhere('country', 'like',$input)
            ->orWhere('postcode', 'like', $input)
            ->get();       

        $adverts = collect();

        $companies->map(function ($company) use ($adverts) {   
            $adverts->push(
                DB::table('adverts')
                    ->where('company_id', $company->id)
                    ->get()
            );
        });

        return $adverts->flatten();
    }

    public function getAdverts(string $input): Collection
    {
        $adverts = DB::table('adverts')
            ->where('title', 'like', $input)
            ->orWhere('reference', 'like', $input)
            ->orWhere('address_1', 'like', $input)
            ->orWhere('address_2', 'like', $input)
            ->orWhere('city', 'like', $input)
            ->orWhere('region', 'like', $input)
            ->orWhere('country', 'like', $input)
            ->orWhere('postcode', 'like', $input)
            ->orWhere('description', 'like', $input)
            ->get();

        return $adverts;
    }
}
