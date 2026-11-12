<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('localisations', function (Blueprint $table) {
            $table->id();
            $table->string('region', 100); // Golfe, Kozah, Plateaux...
            $table->string('ville', 100); // Lomé, Kara, Atakpamé...
            $table->string('adresse', 255)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('localisations');
    }
};
