<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Facades\DB;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technologies')->insert([
            ['name' => 'React'],
            ['name' => 'Java'],
            ['name' => 'PHP'],
            ['name' => 'C#'],
            ['name' => 'JavaScript'],
            ['name' => 'Node'],
        ]);
    }
}
