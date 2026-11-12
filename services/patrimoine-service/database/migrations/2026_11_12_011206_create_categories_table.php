<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique(); // IMM, VEH, EQU, MOB, INF
            $table->string('nom', 100); // Immobilier administratif, Véhicules...
            $table->text('description')->nullable();
            $table->string('icone', 50)->nullable(); // Pour le frontend
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
