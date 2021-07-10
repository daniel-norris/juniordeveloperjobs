<?php

namespace Database\Seeders;

use Database\Seeders\AdvertSeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\RecruiterSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CandidateSeeder::class,
            CompanySeeder::class,
            RecruiterSeeder::class,
            AdvertSeeder::class,
        ]);
    }
}
