<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class RecruiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('recruiters')->insert([
            'id' => 1,
            'title' => $faker->title(),
            'forename' => $faker->firstName(),
            'middle' => '',
            'surname' => $faker->lastName(),
            'bio' => 'Lorem ipsum...',
            'company_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('recruiters')->insert([
            'id' => 2,
            'title' => $faker->title(),
            'forename' => $faker->firstName(),
            'middle' => '',
            'surname' => $faker->lastName(),
            'bio' => 'Lorem ipsum...',
            'company_id' => 2,
            'user_id' => 2,
        ]);

        DB::table('recruiters')->insert([
            'id' => 3,
            'title' => $faker->title(),
            'forename' => $faker->firstName(),
            'middle' => '',
            'surname' => $faker->lastName(),
            'bio' => 'Lorem ipsum...',
            'company_id' => 3,
            'user_id' => 3,
        ]);
    
        DB::table('recruiters')->insert([
            'id' => 4,
            'title' => $faker->title(),
            'forename' => $faker->firstName(),
            'middle' => '',
            'surname' => $faker->lastName(),
            'bio' => 'Lorem ipsum...',
            'company_id' => 4,
            'user_id' => 4,
        ]);
    }
}
