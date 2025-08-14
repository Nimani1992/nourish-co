<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('meal_dietary_tag', function (Blueprint $table) {
            $table->foreignId('meal_id')->constrained('meals')->cascadeOnDelete();
            $table->foreignId('dietary_tag_id')->constrained('dietary_tags')->cascadeOnDelete();
            $table->primary(['meal_id','dietary_tag_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('meal_dietary_tag');
    }
};
