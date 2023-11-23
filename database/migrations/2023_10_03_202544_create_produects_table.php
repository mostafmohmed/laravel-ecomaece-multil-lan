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
        Schema::create('produects', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->string('image')->nullable();
            $table->string('quality');
            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('main__catagotiries');
            $table->foreignId('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produects');
    }
};
