<?php

namespace Database\Factories;

use App\Models\Recruiter;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
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

        return [
            'title' => $this->faker->title(),
            'forename' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'bio' => $this->faker->text(200),
            'avatar' => $this->faker->image($filepath, 400, 300, 'avatar', null, false),
            'company_id' => Company::factory(),
            'account_type' => 'basic',
        ];
    }
}
