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
        Schema::create('course_phases', function (Blueprint $table) {
            $table->id();
            // course relation
            $table->foreignId('course_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('heading')->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('title')->nullable();
            $table->text('desc')->nullable(); 
            
            // JSON fields
            $table->json('features')->nullable();
            $table->json('stats')->nullable();
            
            $table->string('stat_icon')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_phases');
    }
};
