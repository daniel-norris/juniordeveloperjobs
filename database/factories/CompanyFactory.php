<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyFactory extends Factory
{
    private array $company;

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

        $companies = collect([
            [
                'name' => 'Spotify',
                'url' => 'http://www.spotify.com/',
                'logo' => 'storage/images/spotify.png',
                'country' => 'United States',
            ],
            [
                'name' => 'Amazon Web Services',
                'url' => 'https://aws.amazon.com/',
                'logo' => 'storage/images/aws.jpg',
                'country' => 'United States',
            ],
            [
                'name' => 'Microsoft',
                'url' => 'https://www.microsoft.com/',
                'logo' => 'storage/images/microsoft.png',
                'country' => 'United States',
            ],
        ]);
        
        $results = Company::all()->pluck('name');
        $filtered = $companies->whereNotIn('name', $results);

        $this->company = $filtered->first();

        return [
            'name' => $this->company['name'],
            'name_registered' => $this->company['name'] . ' Ltd',
            'address_1' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'region' => $this->faker->county(),
            'country' => $this->company['country'],
            'postcode' => $this->faker->postcode(),
            'email' => 'hello@' . strtolower(str_replace(' ', '', $this->company['name'])) . '.com',
            'phone' => $this->faker->phoneNumber(),
            'url' => $this->company['url'],
            'logo' => $this->company['logo'],
            'account_type' => 'basic',
        ];
    }
}
