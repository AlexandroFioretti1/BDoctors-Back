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
        //Lorenzo:Creating the primarykey 'profile_id' and 'specialiyation_id' in the 'profile_specialization' table 
        Schema::create('profile_specialization', function (Blueprint $table) {

            //Lorenzo:make link 'specialization_id'

                //Lorenzo: creating column call 'specialization_id' into table 'profile_specialization'
                $table->unsignedBigInteger('specialization_id');

                //Lorenzo: Connect column 'specialization_id' into table 'profile_specialization' whit table specialization -> id if deleted drop link
                $table->foreign('specialization_id')->references('id')->on('specializations')->cascadeOnDelete();

            //Lorenzo:make link profile_id

                //Lorenzo: creating column call 'profile_id' into table 'profile_specialization'
                $table->unsignedBigInteger('profile_id');

                //Lorenzo: Connect column 'profile_id' into table 'profile_specialization' whit table profile -> id if deleted drop link
                $table->foreign('profile_id')->references('id')->on('profiles')->cascadeOnDelete();

            //Lorenzo:Specifies the two columns 'profile_id' 'specialiyation_id' as primary
            $table->primary(['profile_id', 'specialization_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Lorenzo: drop table 'profile_specialization'
        Schema::dropIfExists('profile_specialization');
    }
};
