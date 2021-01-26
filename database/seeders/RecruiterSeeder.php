<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recruiter;

class RecruiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recruiter::factory()->count(10)->create();
    }
}
