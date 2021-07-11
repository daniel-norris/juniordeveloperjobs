<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class SearchProvider
{
    public function create(array $input): Collection
    {
        $results = collect();

        if (empty($input['search'])) {
            $adverts = DB::table('adverts')->get();

            $results = collect();

            $adverts->map(function ($advert) use ($results) {
                $results->push($this->mapResults($advert));
            });

            return $results;
        }

        $input = '%' . $input['search'] . '%';

        $this->getCompanies($input)->map(function ($advert) use ($results) {
            $results->push($this->mapResults($advert));
        });

        $this->getAdverts($input)->map(function ($advert) use ($results) {
            $results->push($this->mapResults($advert));
        });

        return $results;
    }

    public function mapResults(stdClass $advert): array
    {
        return [
            'title' => $advert->title,
            'reference' => $advert->reference,
            'company' => DB::table('companies')->where('id', $advert->company_id)->get()->first()->name,
            'city' => $advert->city,
            'range_salary' => '£' . number_format($advert->min_salary) . ' - ' .
                '£' .number_format($advert->max_salary),
        ];
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
            ->orWhere('country', 'like', $input)
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
