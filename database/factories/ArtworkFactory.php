<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artwork>
 */
class ArtworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contact_id' => $this->faker->numberBetween(1,50),
            'title' => $this->faker->word(),
            'size' => $this->faker->numberBetween(1,900),
            'category' => $this->faker->word(),
            'artist_notes' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(1,900),
            'file' => $this->faker->imageUrl(),
            'is_featured' => $this->faker->numberBetween(0,1),
            'is_live' => $this->faker->numberBetween(0,1),
            'on_sale' => $this->faker->numberBetween(0,1),
        ];
    }
}
