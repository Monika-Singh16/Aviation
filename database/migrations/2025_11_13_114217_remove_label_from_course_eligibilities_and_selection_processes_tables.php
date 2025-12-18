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
        // Drop 'label' column from both tables
        Schema::table('course_eligibilities', function (Blueprint $table) {
            if (Schema::hasColumn('course_eligibilities', 'label')) {
                $table->dropColumn('label');
            }
        });

        Schema::table('selection_processes', function (Blueprint $table) {
            if (Schema::hasColumn('selection_processes', 'label')) {
                $table->dropColumn('label');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Re-add 'label' column on rollback
        Schema::table('course_eligibilities', function (Blueprint $table) {
            if (!Schema::hasColumn('course_eligibilities', 'label')) {
                $table->string('label')->nullable();
            }
        });

        Schema::table('selection_processes', function (Blueprint $table) {
            if (!Schema::hasColumn('selection_processes', 'label')) {
                $table->string('label')->nullable();
            }
        });
    }
};
