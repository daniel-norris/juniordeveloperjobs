<?php

namespace Database\Factories;

use App\Models\Advert;
use App\Models\Recruiter;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => $this->faker->regexify('[A-Z]{4}[0-9]{6}'),
            'title' => $this->faker->sentence(mt_rand(3, 6)),
            'address_1' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'region' => $this->faker->county(),
            'country' => $this->faker->country(),
            'postcode' => $this->faker->postcode(),
            'min_salary' => $this->faker->numberBetween(mt_rand(25000, 29000), mt_rand(29001, 31000)),
            'max_salary' => $this->faker->numberBetween(mt_rand(31001, 33000), mt_rand(33001, 35000)),
            'description' => $this->faker->paragraphs(mt_rand(6, 14), true),
            'featured' => $this->faker->boolean(),
            'external_url' => $this->faker->url(),
            'remote' => $this->faker->boolean(),
            'recruiter_id' => Recruiter::factory(),
            'duration' => $this->faker->randomElement([12, 24, 48, 72, 120, 336]),
        ];
    }
}
