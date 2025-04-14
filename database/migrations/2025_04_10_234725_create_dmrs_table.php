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
        Schema::create('dmrs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('serie');
            $table->foreignUuid('type_dmr_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('entite_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('model_dmr_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dmrs');
    }
};
