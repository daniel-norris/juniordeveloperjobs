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
            'id' => 1,
            'username' => $faker->firstName(),
            'email' => $faker->email(),
            'password' => Hash::make('testing123'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'username' => $faker->firstName(),
            'email' => $faker->email(),
            'password' => Hash::make('testing123'),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'username' => $faker->firstName(),
            'email' => $faker->email(),
            'password' => Hash::make('testing123'),
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'username' => $faker->firstName(),
            'email' => $faker->email(),
            'password' => Hash::make('testing123'),
        ]);
    }
}
