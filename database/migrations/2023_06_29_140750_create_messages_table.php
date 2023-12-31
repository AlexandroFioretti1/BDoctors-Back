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
        //Lorenzo:Creating columns for the 'Messages' table
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('user_name_surname');
            $table->text('text');
            $table->datetime('date');
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
        //Lorenzo: drop table 'messages'
        Schema::dropIfExists('messages');
    }
};
