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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->text('job_description');
            $table->json('key_responsibilities');
            $table->json('key_process');
            $table->json('skills_qualification');
            $table->json('work_experience');
            $table->json('benefits');
            $table->date('date_opened');
            $table->string('job_type');
            $table->string('industry');
            $table->string('salary');
            $table->string('city');
            $table->string('state_province');
            $table->string('country');
            $table->string('zip_postal_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
