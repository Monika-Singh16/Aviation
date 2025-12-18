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
        Schema::create('why_vaa', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable();
            $table->text('main_desc')->nullable();
            $table->string('image')->nullable();
            $table->string('image_title')->nullable();
            $table->string('image_sub_title')->nullable();
            $table->text('image_sub_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_vaa');
    }
};
