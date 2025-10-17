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
        Schema::create('server_channels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('server_category_id')
                ->constrained('server_categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('type');
            $table->string('name');
            $table->integer('sort');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_channels');
    }
};
