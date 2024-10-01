<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Church;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(),
            'slug'=>$this->faker->unique()->slug(4),
            'body'=>$this->faker->paragraph(),
            'published'=>$this->faker->randomElement([false, true]),
            'category_id'=>Category::all()->random()->id,
            'user_id'=>User::all()->random()->id,
            'church_id'=>Church::all()->random()->id,
        ];
    }
}
