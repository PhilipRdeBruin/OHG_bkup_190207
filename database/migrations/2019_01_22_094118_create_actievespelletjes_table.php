<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActievespelletjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actievespelletjes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('spel_id');
            $table->unsignedInteger('host');
            $table->unsignedInteger('gamestate');
            $table->unsignedInteger('winnaar')->nullable();
            $table->foreign('spel_id')->references('id')->on('spelletjes');
            $table->foreign('host')->references('id')->on('users');
            $table->foreign('winnaar')->references('id')->on('users'); 
            $table->dateTime('aanvangstijdstip');
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
        Schema::dropIfExists('actievespelletjes');
    }
}
