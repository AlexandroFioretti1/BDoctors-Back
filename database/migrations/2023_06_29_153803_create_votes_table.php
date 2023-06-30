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
        //Lorenzo:Creating columns for the 'votes' table
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('vote');
            $table->datetime('time');
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
        //Lorenzo: drop table 'votes'
        Schema::dropIfExists('votes');
    }
};
