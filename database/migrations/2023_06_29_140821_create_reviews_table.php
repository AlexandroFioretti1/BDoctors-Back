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
        //Lorenzo:Creating columns for the 'Reviews' table
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->dateTime('date');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
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
        //Lorenzo: drop table 'reviews'
        Schema::dropIfExists('reviews');
    }
};
