<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'town_city' => $this->faker->city(),
            'region_county' => $this->faker->state(),
            'country_code' => $this->faker->countryCode(),
            'post_code' => $this->faker->postcode()
        ];
    }
}
