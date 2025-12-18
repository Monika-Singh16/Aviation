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
        Schema::create('vision_mission', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('card_1');
            $table->string('card_2');
            $table->string('card_3');
            $table->string('card_4');
            $table->string('image');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vision_mission');
    }
};
