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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();

            // Foreign key to the courses table
            $table->foreignId('course_id')
                ->constrained()
                ->onDelete('cascade');
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('email');
            $table->string('mobile');
            $table->string('alternate_mobile')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('dgca_medical_status')->nullable();
            $table->string('educational_status')->nullable();
            $table->string('physics_math_12th')->nullable();

            // Foreign keys to the location tables
            $table->foreignId('state_id')
                ->nullable()
                ->constrained('states')
                ->nullOnDelete();
            $table->foreignId('city_id')
                ->nullable()
                ->constrained('cities')
                ->nullOnDelete();

            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
