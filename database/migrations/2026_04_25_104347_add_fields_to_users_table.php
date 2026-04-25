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
        Schema::table('users', function (Blueprint $table) {
            $table->string('matricule')->unique()->after('id');

            $table->enum('role', [
                'chef_equipe',
                'agent',
                'chef_service'
            ])->default('agent')->after('password');

            $table->foreignId('team_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete()
                ->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
