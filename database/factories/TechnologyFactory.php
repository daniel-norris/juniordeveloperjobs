<?php

namespace Database\Factories;

use App\Models\Technology;
use Illuminate\Database\Eloquent\Factories\Factory;

class TechnologyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Technology::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'React',
                'Node',
                'Java',
                'Python',
                'Django',
                'Laravel',
                'C#',
                'C++',
                'Golang',
                'PHP',
                'Vue',
                'Angular',
                'HTML',
                'CSS',
                'JavaScript',
            ])
        ];
    }
}
