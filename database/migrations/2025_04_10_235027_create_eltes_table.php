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
        Schema::create('eltes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('entite_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('model_elte_id')->constrained()->onDelete('cascade');
            $table->string('serie');
            $table->string('numero_appel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eltes');
    }
};
