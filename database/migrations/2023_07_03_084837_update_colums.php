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
        Schema::table('profiles', function (Blueprint $table) {
            //updating columns for the 'Profiles' table
            $table->string('phone_number')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->text('doctor_image')->nullable()->change();
            $table->string('cv')->nullable()->change();
            $table->string('performances')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('phone_number')->change();
            $table->string('address')->change();
            $table->text('doctor_image')->change();
            $table->string('cv')->change();
            $table->string('performances')->change();
        });
    }
};
