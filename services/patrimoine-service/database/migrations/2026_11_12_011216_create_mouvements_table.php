<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mouvements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bien_id')->constrained('biens')->onDelete('cascade');
            $table->enum('type', ['affectation', 'transfert', 'retour_maintenance', 'mise_hors_service', 'revaluation']);
            $table->string('entite_destinataire', 255); // Ministère de la Santé
            $table->enum('statut', ['en_validation', 'valide', 'a_surveiller'])->default('en_validation');
            $table->date('date_mouvement');
            $table->date('date_fin')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mouvements');
    }
};
