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
        //Lorenzo:Creating the primarykey 'profile_id' and 'sponsor_id' in the profile_sponsor table 
        Schema::create('profile_sponsor', function (Blueprint $table) {
           
            //Lorenzo:make link sponsor_id

                //Lorenzo: creating column call 'sponsor_id' into table 'profile_sponsor'
                $table->unsignedBigInteger('sponsor_id');

                //Lorenzo: Connect column 'sponsor_id' into table 'profile_sponsor' whit table profile -> id if deleted drop link
                $table->foreign('sponsor_id')->references('id')->on('sponsors')->cascadeOnDelete();

            //Lorenzo:make link profile_id

                //Lorenzo: creating column call 'profile_id' into table 'profile_sponsor'
                $table->unsignedBigInteger('profile_id');

                //Lorenzo: Connect column 'profile_id' into table 'profile_sponsor' whit table sponsor -> id if deleted drop link
                $table->foreign('profile_id')->references('id')->on('profiles')->cascadeOnDelete();
           
            //Lorenzo:Specifies the two columns 'profile_id' 'sponsor_id' as primary
            $table->primary(['profile_id', 'sponsor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_sponsor');
    }
};
