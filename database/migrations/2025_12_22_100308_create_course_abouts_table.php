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
        Schema::create('course_abouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            // course relation
            $table->foreignId('course_id')
                ->unique()
                ->constrained()
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_abouts');
    }
};
