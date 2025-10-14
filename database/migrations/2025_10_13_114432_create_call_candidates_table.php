<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('call_candidates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('call_id')
                ->constrained('calls')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('type')->index();
            $table->json('candidate_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_candidates');
    }
};
