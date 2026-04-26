<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Dossier;
use App\Models\ProductivitySheet;
use App\Models\ProductivityEntry;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 0. Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'chef_service',
            'matricule' => 0000,
        ]);

        // 1. Teams
        $teams = Team::factory(5)->create();

        foreach ($teams as $team) {

            // 2. Chef d’équipe
            $chef = User::factory()->create([
                'role' => 'chef_equipe',
                'team_id' => $team->id,
            ]);

            // 3. Agents
            $agents = User::factory(20)->create([
                'role' => 'agent',
                'team_id' => $team->id,
            ]);

            // 4. Dossiers
            $dossiers = Dossier::factory(50)->create([
                'chef_equipe_id' => $chef->id,
            ]);

            // 5. Sheet du jour
            $sheet = ProductivitySheet::factory()->create([
                'team_id' => $team->id,
                'chef_equipe_id' => $chef->id,
                'date' => fake()->date(),
            ]);

            // 6. Entries
            foreach ($agents as $agent) {
                foreach (['pharmacie', 'soins', 'examens'] as $type) {

                    ProductivityEntry::factory()->create([
                        'productivity_sheet_id' => $sheet->id,
                        'agent_id' => $agent->id,
                        'type' => $type,
                    ]);
                }
            }
        }

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
