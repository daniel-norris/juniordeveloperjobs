<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            'Software Engineer',
            'Junior Developer',
            'Senior Software Engineer',
            'Software Development Lead',
        ];

        $faker = Factory::create();

        foreach($titles as $title) {
            DB::table('adverts')->insert([
                'reference' => '',
                'title' => $title,
                'address_1' => $faker->buildingNumber(),
                'address_2' => $faker->streetName(),
                'city' => $faker->city(),
                'region' => $faker->state(),
                'country' => 'US',
                'postcode' => $faker->postcode(),
                'min_salary' => $faker->numberBetween(29000, 55000),
                'max_salary' => $faker->numberBetween(55001, 99000),
                'description' => 'Lorem ipsum...',
                'featured' => 1,
                'external_url' => '',
                'remote' => 1,
                'recruiter_id' => 1,
                'company_id' => 1, 
            ]);
        }

        foreach($titles as $title) {
            DB::table('adverts')->insert([
                'reference' => '',
                'title' => $title,
                'address_1' => $faker->buildingNumber(),
                'address_2' => $faker->streetName(),
                'city' => $faker->city(),
                'region' => $faker->state(),
                'country' => 'US',
                'postcode' => $faker->postcode(),
                'min_salary' => $faker->numberBetween(29000, 55000),
                'max_salary' => $faker->numberBetween(55001, 99000),
                'description' => 'Lorem ipsum...',
                'featured' => 1,
                'external_url' => '',
                'remote' => 1,
                'recruiter_id' => 2,
                'company_id' => 2, 
            ]);
        }

        foreach($titles as $title) {
            DB::table('adverts')->insert([
                'reference' => '',
                'title' => $title,
                'address_1' => $faker->buildingNumber(),
                'address_2' => $faker->streetName(),
                'city' => $faker->city(),
                'region' => $faker->state(),
                'country' => 'US',
                'postcode' => $faker->postcode(),
                'min_salary' => $faker->numberBetween(29000, 55000),
                'max_salary' => $faker->numberBetween(55001, 99000),
                'description' => 'Lorem ipsum...',
                'featured' => 1,
                'external_url' => '',
                'remote' => 1,
                'recruiter_id' => 3,
                'company_id' => 3, 
            ]);
        }

        foreach($titles as $title) {
            DB::table('adverts')->insert([
                'reference' => '',
                'title' => $title,
                'address_1' => $faker->buildingNumber(),
                'address_2' => $faker->streetName(),
                'city' => $faker->city(),
                'region' => $faker->state(),
                'country' => 'US',
                'postcode' => $faker->postcode(),
                'min_salary' => $faker->numberBetween(29000, 55000),
                'max_salary' => $faker->numberBetween(55001, 99000),
                'description' => 'Lorem ipsum...',
                'featured' => 1,
                'external_url' => '',
                'remote' => 1,
                'recruiter_id' => 4,
                'company_id' => 4, 
            ]);
        }
    }
}
