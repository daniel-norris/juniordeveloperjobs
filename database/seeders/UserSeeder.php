<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('users')->insert([
            'name' => $faker->firstName(),
            'email' => $faker->email(),
            'password' => Hash::make('testing123'),
        ]);

        DB::table('users')->insert([
            'name' => $faker->firstName(),
            'email' => $faker->email(),
            'password' => Hash::make('testing123'),
        ]);

        DB::table('users')->insert([
            'name' => $faker->firstName(),
            'email' => $faker->email(),
            'password' => Hash::make('testing123'),
        ]);

        DB::table('users')->insert([
            'name' => $faker->firstName(),
            'email' => $faker->email(),
            'password' => Hash::make('testing123'),
        ]);
    }
}
