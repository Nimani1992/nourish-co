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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
        $table->string('name');                    // Meal name
        $table->text('description')->nullable();   // Description
        $table->string('category');                // e.g. vegetarian, keto
        $table->string('image_path')->nullable();  // Meal image path
        $table->decimal('price', 8, 2);            // Meal price
        $table->boolean('is_available')->default(true); // For availability
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
