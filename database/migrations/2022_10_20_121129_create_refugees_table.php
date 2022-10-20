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
        Schema::create('refugees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('photo')->nullable();
            $table->string('family')->nullable();
            $table->string('pets')->nullable();
            $table->string('destination')->nullable();
            $table->string('aidReceived')->nullable();
            $table->string('healthCondition')->nullable();
            $table->string('moodUponArrival')->nullable();
            $table->unsignedBigInteger('bedsTaken');
            $table->unsignedBigInteger('refugee_camp_id');
            $table->foreign('refugee_camp_id')->references('id')->on('refugee_camps')->onDelete('cascade');
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
        Schema::dropIfExists('refugees');
    }
};
