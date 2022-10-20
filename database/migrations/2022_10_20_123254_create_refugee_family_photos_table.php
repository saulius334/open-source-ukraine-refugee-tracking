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
        Schema::create('refugee_family_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('refugee_families_id');
            $table->foreign('refugee_families_id')->references('id')->on('refugee_families');
            $table->string('url', 300);
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
        Schema::dropIfExists('refugee_family_photos');
    }
};
