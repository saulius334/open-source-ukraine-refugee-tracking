<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refugee_families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('refugee_id');
            $table->foreign('refugee_id')->references('id')->on('refugees')->onDelete('cascade');
            $table->string('name');
            $table->string('surname');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refugee_families');
    }
};
