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
        //Lorenzo:Creating the foreign user_id in the profiles table by table users->id
        Schema::table('profiles', function (Blueprint $table) {

            //Lorenzo: creating column after column 'id' call user_id into table 'profiles' type 'nullable'
            $table->unsignedBigInteger('user_id')->nullable()->after('id');

            //Lorenzo: Connect column user_id with table user -> id if deleted set it to null
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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

            $table->dropForeign('profiles_user_id_foreign');
            //Lorenzo: drop column 'user_id'
            $table->dropColumn('user_id');
        });
    }
};
