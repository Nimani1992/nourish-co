<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('meals', function (Blueprint $table) {
            if (!Schema::hasColumn('meals', 'meal_type_id')) {
                $table->foreignId('meal_type_id')->nullable()->after('name')
                      ->constrained('meal_types')->nullOnDelete();
            }
        });
    }
    public function down(): void {
        Schema::table('meals', function (Blueprint $table) {
            if (Schema::hasColumn('meals', 'meal_type_id')) {
                $table->dropConstrainedForeignId('meal_type_id');
            }
        });
    }
};
