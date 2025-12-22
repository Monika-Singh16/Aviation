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
        Schema::create('excellences', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title')->nullable();
            $table->string('title')->nullable();
            $table->string('icon')->nullable();
            $table->string('card_title')->nullable();
            $table->text('card_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excellences');
    }
};
