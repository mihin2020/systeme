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
        Schema::create('tetras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('entite_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('model_tetra_id')->constrained()->onDelete('cascade');
            $table->string('serie');
            $table->string('numero_appel');
            $table->string('security_group');
            $table->string('numero_group');
            $table->string('talk_group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tetras');
    }
};
