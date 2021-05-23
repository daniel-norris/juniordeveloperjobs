<?php

namespace Database\Factories;

use App\Models\Recruiter;
use App\Models\Company;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecruiterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recruiter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filepath = storage_path('app/public/avatars');

        if (!Storage::exists($filepath)) {
            Storage::makeDirectory($filepath);
        }

        $companyMax = config('testing.company.max');

        $company = DB::table('companies')->count() < $companyMax ? Company::factory()->create() : DB::table('companies')->where('id', rand(1, $companyMax))->first()->id;

        return [
            'title' => $this->faker->title(),
            'forename' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'user_id' => User::factory()->create(),
            'bio' => $this->faker->text(200),
            'avatar' => $this->faker->image($filepath, 400, 300, 'avatar', null, false),
            'company_id' => $company,
            'account_type' => 'basic',
        ];
    }
}
