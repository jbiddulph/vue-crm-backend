<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_id' => $this->faker->numberBetween(1,50),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
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
