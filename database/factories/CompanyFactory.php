<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filepath = storage_path('app/public/images');

        if (!Storage::exists($filepath)) {
            Storage::makeDirectory($filepath);
        }

        return [
            'name' => $this->faker->company(),
            'name_registered' => $this->faker->company(),
            'address_1' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'region' => $this->faker->county(),
            'country' => $this->faker->country(),
            'postcode' => $this->faker->postcode(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'url' => $this->faker->url(),
            'logo' => $this->faker->image($filepath, 400, 300, 'test', null, false),
            'account_type' => 'basic',
        ];
    }
}
