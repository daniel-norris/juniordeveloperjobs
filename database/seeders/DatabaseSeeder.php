<?php

namespace Database\Seeders;

use App\Models\Advert;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
            AdvertSeeder::class,
        ]);
    }
}
