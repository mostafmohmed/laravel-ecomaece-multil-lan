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
        Schema::create('main__catagotiries', function (Blueprint $table) {
            $table->id();
            $table->string('translation_lang');
            $table->string('name');
            $table->string('slog');
            $table->string('photo');
            $table->integer('active');

            $table->integer('translation_of');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__catagotiries');
    }
};
