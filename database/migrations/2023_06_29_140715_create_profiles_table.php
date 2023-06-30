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
        //Lorenzo:Creating columns for the 'Profiles' table
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('phone_number');
            $table->string('address');
            $table->text('doctor_image');
            $table->string('cv');
            $table->string('perfomances');
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
        Schema::dropIfExists('profiles');
    }
};
