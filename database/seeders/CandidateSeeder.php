<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('candidates')->insert([
            'title' => $faker->title(),
            'forename' => $faker->firstName(),
            'surname' => $faker->lastName(),
            'user_id' => 1,
            'bio' => 'Lorem ipsum...',
            'avatar' => '',
            'country' => 'US',
            'address_1' => $faker->buildingNumber(),
            'address_2' => $faker->streetName(),
            'city' => $faker->city(),
            'postcode' => $faker->postcode(),
        ]);

        DB::table('candidates')->insert([
            'title' => $faker->title(),
            'forename' => $faker->firstName(),
            'surname' => $faker->lastName(),
            'user_id' => 2,
            'bio' => 'Lorem ipsum...',
            'avatar' => '',
            'country' => 'US',
            'address_1' => $faker->buildingNumber(),
            'address_2' => $faker->streetName(),
            'city' => $faker->city(),
            'postcode' => $faker->postcode(),
        ]);

        DB::table('candidates')->insert([
            'title' => $faker->title(),
            'forename' => $faker->firstName(),
            'surname' => $faker->lastName(),
            'user_id' => 3,
            'bio' => 'Lorem ipsum...',
            'avatar' => '',
            'country' => 'US',
            'address_1' => $faker->buildingNumber(),
            'address_2' => $faker->streetName(),
            'city' => $faker->city(),
            'postcode' => $faker->postcode(),
        ]);

        DB::table('candidates')->insert([
            'title' => $faker->title(),
            'forename' => $faker->firstName(),
            'surname' => $faker->lastName(),
            'user_id' => 4,
            'bio' => 'Lorem ipsum...',
            'avatar' => '',
            'country' => 'US',
            'address_1' => $faker->buildingNumber(),
            'address_2' => $faker->streetName(),
            'city' => $faker->city(),
            'postcode' => $faker->postcode(),
        ]);


    }
}
