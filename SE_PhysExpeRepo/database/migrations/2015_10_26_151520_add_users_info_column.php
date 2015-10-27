<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersInfoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->enum('sex',['male','female','secret']);
            $table->string('company');
            $table->string('company_addr');
            $table->date('birthday');
            $table->text('introduction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn('sex');
            $table->dropColumn('company');
            $table->dropColumn('company_addr');
            $table->dropColumn('birthday');
            $table->dropColumn('introduction');
        });
    }
}
