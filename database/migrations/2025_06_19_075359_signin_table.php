<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SigninTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!schema::hasTable('signin')){
            schema::create('signin', function(Blueprint $table){
                $table->id('signin_id')->PRIMARYKEY()->AUTOINCREMENT();
                $table->string('name');
                $table->string('email', 191)->unique();
                $table->string('password');
                $table->string('contact_no');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
