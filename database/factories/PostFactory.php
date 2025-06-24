<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image' => 'https://source.unsplash.com/random',
            'category_id' => rand(1,20),
            'user_id' => rand(1,10),
            'slug' => Str::slug(fake()->name()),
            'description' => fake()->paragraph(),
            'created_at' => fake()->unixTime(),
        ];
    }
}
