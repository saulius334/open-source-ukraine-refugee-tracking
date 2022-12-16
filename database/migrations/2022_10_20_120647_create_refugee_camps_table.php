<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('refugee_camps', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('originalCapacity');
            $table->unsignedbigInteger('currentCapacity');
            $table->decimal('coords_lat', 8, 6);
            $table->decimal('coords_lng', 9, 6);
            $table->unsignedbigInteger('rooms')->nullable();
            $table->unsignedbigInteger('volunteers')->default(0)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('refugee_camps');
    }
};
