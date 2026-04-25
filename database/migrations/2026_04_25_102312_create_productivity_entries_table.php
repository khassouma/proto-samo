<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productivity_entries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('productivity_sheet_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('agent_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Typologie du travail
            $table->enum('type', ['pharmacie', 'soins', 'examens']);
            $table->enum('categorie', ['hopital', 'cscom', 'normal']);

            $table->integer('quantite')->default(0);

            // Statuts de production
            $table->integer('creer')->default(0);
            $table->integer('liquider')->default(0);
            $table->integer('rejeter')->default(0);
            $table->integer('non_liquide')->default(0);

            // Présence agent
            $table->enum('statut_agent', ['present', 'absent', 'malade'])
                ->default('present');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productivity_entries');
    }
};
