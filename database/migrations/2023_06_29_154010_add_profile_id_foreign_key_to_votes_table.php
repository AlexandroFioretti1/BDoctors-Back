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
        //Lorenzo:Creating the foreign profile_id in the votes table by table profile -> id
        Schema::table('votes', function (Blueprint $table) {

            //Lorenzo: creating column after column 'id' call 'profile_id' into table 'votes' type 'nullable'
            $table->unsignedBigInteger('profile_id')->nullable()->after('id');

            //Lorenzo: Connect column 'profile_id' with table profile -> id if deleted set it to null
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {

            //Lorenzo: drop link 'votes' by foreign 'profile_id'
            $table->dropForeign('votes_profile_id_foreign');

            //Lorenzo: drop column 'profile_id'
            $table->dropColumn('profile_id');
        });
    }
};
