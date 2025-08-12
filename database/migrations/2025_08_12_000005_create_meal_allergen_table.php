<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('meal_allergen', function (Blueprint $table) {
            $table->foreignId('meal_id')->constrained('meals')->cascadeOnDelete();
            $table->foreignId('allergen_id')->constrained('allergens')->cascadeOnDelete();
            $table->primary(['meal_id','allergen_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('meal_allergen');
    }
};
