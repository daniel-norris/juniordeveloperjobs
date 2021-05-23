<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\Company;
use App\Models\Advert;

class SearchProvider extends Model
{
    public function create(?string $input): Collection|null
    {
        if (empty($input)) {
            return Advert::all();
        }

        $input = '/' . $input . '/i';

        $companies = Company::all()
            ->filter(function ($company) use ($input) {
                return preg_match($input, $company->id) ||
                    preg_match($input, $company->name) ||
                    preg_match($input, $company->name_registered) ||
                    preg_match($input, $company->address_1) ||
                    preg_match($input, $company->address_2) ||
                    preg_match($input, $company->city) ||
                    preg_match($input, $company->region) ||
                    preg_match($input, $company->country) ||
                    preg_match($input, $company->postcode);
            });
        
        $results = collect();

        $companies->map(function ($company) use ($results) {
            $company->adverts->map(function ($advert) use ($results) {
                $results->push($advert);
            });
        });

        $adverts = Advert::all()
            ->filter(function ($advert) use ($input) {
                return preg_match($input, $advert->title) ||
                    preg_match($input, $advert->address_1) ||
                    preg_match($input, $advert->address_2) ||
                    preg_match($input, $advert->city) ||
                    preg_match($input, $advert->region) ||
                    preg_match($input, $advert->country) ||
                    preg_match($input, $advert->postcode) ||
                    preg_match($input, $advert->description);
            });

        if ($adverts->first()) {
            $adverts->map(function ($advert) use ($results) {
                $results->push($advert);
            });
        }

        return $results;
    }
}
