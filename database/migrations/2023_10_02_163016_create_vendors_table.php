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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('adress');
            $table->string('mobile')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('logo');
            $table->string('longitude');
            $table->string('latitude');
        
            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('main__catagotiries');
            $table->string('active');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
