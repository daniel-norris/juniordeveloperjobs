<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advert;

class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advert::factory()
            ->count(3)
            ->hasTech(mt_rand(1, 2))
            ->create();
    }
}
