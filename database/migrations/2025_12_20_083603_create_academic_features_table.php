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
        Schema::create('academic_features', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title')->nullable();
            $table->string('title')->nullable();
            $table->enum('vihanga_type', ['boolean', 'text'])->default('boolean');
            $table->boolean('vihanga_bool')->nullable(); 
            $table->string('vihanga_text')->nullable();
            $table->enum('other_type', ['boolean', 'text'])->default('boolean');
            $table->boolean('other_bool')->nullable();   
            $table->string('other_text')->nullable();   
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_features');
    }
};
