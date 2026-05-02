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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();

            $table->string('tiers_payant')->unique();
            $table->string('dg');
            $table->integer('nombre_fiches')->default(0);

            $table->enum('type', ['pharmacie', 'soins', 'examens']);
            $table->enum('categorie', ['hopital', 'cscom', 'normal']);

            $table->enum('statut', [
                'non_liquide',
                'en_liquidation',
                'pre_controle',
                'valide',
                'archive'
            ])->default('non_liquide');

            $table->foreignId('chef_equipe_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->boolean('has_issue')->default(false);
            $table->text('issue_note')->nullable();
            $table->timestamp('issue_resolved_at')->nullable();

            $table->timestamp('date_reception')->nullable();
            $table->timestamp('date_validation')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};
