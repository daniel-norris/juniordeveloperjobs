<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Company;
use App\Models\Advert;
use Illuminate\Support\Str;

class SearchProvider extends Model
{
    public function create(?string $input): Collection
    {
        if (empty($input)) {
            $results = Company::all()->load(['recruiters', 'adverts']);
            return $results;
        }

        $input = '/' . $input . '/i';

        $advertData = Advert::all();
        $advertData = $advertData->filter(function ($advert) use ($input) {
            return preg_match($input, $advert->title) ||
                    preg_match($input, $advert->address_1) ||
                    preg_match($input, $advert->address_2) ||
                    preg_match($input, $advert->city) ||
                    preg_match($input, $advert->region) ||
                    preg_match($input, $advert->country) ||
                    preg_match($input, $advert->postcode) ||
                    preg_match($input, $advert->description);
        });

        $advertData = $advertData->pluck('id');
        $advertData = $advertData->all();

        $companyData = Company::all();
        $companyData = $companyData->load(['recruiters', 'adverts']);
        $companyData = $companyData->whereIn('id', $advertData);

        $results = Company::all();
        $results = $results->load(['recruiters', 'adverts']);
        $results = $results->filter(function ($company) use ($input) {
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

        $results = $results->concat($companyData);

        return $results;
    }
}
