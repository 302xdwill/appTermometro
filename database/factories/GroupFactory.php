<?php

namespace Database\Factories;

use App\Models\Church;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->sentence(4),
            'text'=>$this->faker->unique()->slug(4),
            'motto'=>$this->faker->paragraph(),
            'song'=>$this->faker->paragraph(),
            'church_id'=>Church::all()->random()->id,
        ];
    }
}
