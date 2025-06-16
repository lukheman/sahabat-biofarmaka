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
        Schema::create('basis_pengetahuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gejala')->constrained('gejala')->cascadeOnDelete();
            $table->foreignId('id_penyakit')->constrained('penyakit')->cascadeOnDelete();
            $table->float('mb'); // measure belief
            $table->float('md'); // measure disbelief
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basis_pengetahuan');
    }
};
