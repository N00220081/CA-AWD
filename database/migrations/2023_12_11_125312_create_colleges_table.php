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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->timestamps();

            $table->foreignId('college_id')->nullable(); 
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};

