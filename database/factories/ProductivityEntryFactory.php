<?php

namespace Database\Factories;

// use App\Models\Dossier;
use App\Models\ProductivityEntry;
// use App\Models\ProductivitySheet;
// use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductivityEntry>
 */
class ProductivityEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'productivity_sheet_id' => null,
            'agent_id' => null,

            'type' => fake()->randomElement(['pharmacie', 'soins', 'examens']),
            'categorie' => fake()->randomElement(['hopital', 'cscom', 'normal']),

            'quantite' => fake()->numberBetween(1, 20),

            'creer' => fake()->numberBetween(0, 10),
            'liquider' => fake()->numberBetween(0, 10),
            'rejeter' => fake()->numberBetween(0, 5),
            'non_liquide' => fake()->numberBetween(0, 5),

            'statut_agent' => fake()->randomElement(['present', 'absent', 'malade']),
        ];

        // return [
        //     'productivity_sheet_id' => fake()->boolean(70)
        //         ? ProductivitySheet::inRandomOrder()->value('id')
        //         : null,

        //     'agent_id' => fake()->boolean(70)
        //         ? User::agent()->inRandomOrder()->value('id')
        //         : null,

        //     'dossier_id' => fake()->boolean(70)
        //         ? Dossier::inRandomOrder()->value('id')
        //         : null,

        //     'type' => fake()->randomElement(['pharmacie', 'soins', 'examens']),
        //     'categorie' => fake()->randomElement(['hopital', 'cscom', 'normal']),

        //     'quantite' => fake()->numberBetween(1, 300),

        //     'creer' => fake()->numberBetween(0, 10),
        //     'liquider' => fake()->numberBetween(0, 10),
        //     'rejeter' => fake()->numberBetween(0, 5),
        //     'non_liquide' => fake()->numberBetween(0, 5),

        //     'statut_agent' => fake()->randomElement(['present', 'absent', 'malade']),
        // ];
    }
}
