<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            'Amazon',
            'Facebook',
            'Netflix',
            'Spotify',
        ];

        $faker = Factory::create();

        $id = 1;

        foreach($companies as $company){
            DB::table('companies')->insert([
                'id' => $id++,
                'name' => $company,
                'registered_name' => $company . ' Inc.',
                'address_1' => $faker->buildingNumber(),
                'address_2' => $faker->streetName(),
                'city' => 'San Francisco',
                'region' => 'California',
                'country' => 'US',
                'postcode' => $faker->postcode(),
                'email' => 'test@' . strtolower($company) . '.com',
                'phone' => $faker->phoneNumber(),
                'url' => 'wwww.' . strtolower($company) . '.com',
                'logo' => '/' . strtolower($company) . '/logo'
            ]);
        }
    }
}
