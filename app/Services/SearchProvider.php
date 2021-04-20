<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\Company;
use App\Models\Advert;
use Illuminate\Database\Eloquent\Builder;

class SearchProvider extends Model
{
    public function create(?string $input): Collection|null
    {
        if (empty($input)) {
            $results = Company::has('adverts')->get();
            return $results;
        }

        $input = '/' . $input . '/i';

        $advertData = Advert::all()
            ->filter(function ($advert) use ($input) {
            return preg_match($input, $advert->title) ||
                    preg_match($input, $advert->address_1) ||
                    preg_match($input, $advert->address_2) ||
                    preg_match($input, $advert->city) ||
                    preg_match($input, $advert->region) ||
                    preg_match($input, $advert->country) ||
                    preg_match($input, $advert->postcode) ||
                    preg_match($input, $advert->description);
        })->pluck('id');

        if (!isset($advertData)) {
            return null;
        }

        $companyData = Company::whereHas('adverts', function (Builder $query) use ($advertData) {
            $query->where('adverts.id', '=', [$advertData]);
        })->get();

        $results = Company::all()
            ->load(['recruiters', 'adverts'])
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
        })->concat($companyData);

        return $results;
    }
}
