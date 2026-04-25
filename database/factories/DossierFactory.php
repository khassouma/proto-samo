<?php

namespace Database\Factories;

use App\Models\Dossier;
// use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dossier>
 */
class DossierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matricule' => fake()->unique()->numerify('#####'),
            'nombre_fiches' => fake()->numberBetween(1, 20),
            'type' => fake()->randomElement(['pharmacie', 'soins', 'examens']),
            'categorie' => fake()->randomElement(['hopital', 'cscom', 'normal']),
            'statut' => fake()->randomElement([
                'non_liquide',
                'en_liquidation',
                'pre_controle',
                'valide'
            ]),
            'chef_equipe_id' => null,
            'has_issue' => fake()->boolean(),
            'issue_note' => fake()->sentence(),
            'date_reception' => now()->subDays(rand(1, 10)),
            'date_validation' => now(),
        ];

        // return [
        //     'matricule' => fake()->unique()->numerify('#####'),
        //     'nombre_fiches' => fake()->numberBetween(20, 1000),
        //     'type' => fake()->randomElement(['pharmacie', 'soins', 'examens']),
        //     'categorie' => fake()->randomElement(['hopital', 'cscom', 'normal']),
        //     'statut' => fake()->randomElement([
        //         'non_liquide',
        //         'en_liquidation',
        //         'pre_controle',
        //         'valide'
        //     ]),
        //     'chef_equipe_id' => fake()->boolean(70)
        //         ? User::chefEquipe()->inRandomOrder()->value('id')
        //         : null,
        //     'has_issue' => fake()->boolean(),
        //     'issue_note' => fake()->sentence(),
        //     'date_reception' => now()->subDays(rand(1, 10)),
        //     'date_validation' => now(),
        // ];
    }
}
