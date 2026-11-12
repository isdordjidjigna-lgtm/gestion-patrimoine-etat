<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 30)->unique(); // PAT-IMM-0042
            $table->string('designation', 255);
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('restrict');
            $table->foreignId('localisation_id')->nullable()->constrained('localisations')->onDelete('set null');
            $table->decimal('valeur', 15, 2)->default(0); // 3,82 Md FCFA
            $table->date('date_acquisition')->nullable();
            $table->string('mode_acquisition', 100)->nullable(); // Achat public, Don...
            $table->string('immatriculation', 50)->nullable(); // TG N° 18 764 Golfe
            $table->decimal('surface', 10, 2)->nullable(); // 4 260 m²
            $table->integer('duree_amortissement')->nullable(); // 30 ans
            $table->string('responsable', 150)->nullable();
            $table->enum('statut', ['conforme', 'degrade', 'a_verifier', 'reforme'])->default('a_verifier');
            $table->text('description')->nullable();
            $table->string('photo_principale', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
