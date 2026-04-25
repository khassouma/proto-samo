<?php

namespace Database\Factories;

use App\Models\ProductivitySheet;
// use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductivitySheet>
 */
class ProductivitySheetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'team_id' => null,
            'chef_equipe_id' => null,
            'status' => fake()->randomElement(['draft', 'submitted', 'validated']),
        ];
        // return [
        //     'date' => fake()->date(),
        //     'team_id' => null,
        //     'chef_equipe_id' => fake()->boolean(70)
        //         ? User::chefEquipe()->inRandomOrder()->value('id')
        //         : null,
        //     'status' => fake()->randomElement(['draft', 'submitted', 'validated']),
        // ];
    }
}
