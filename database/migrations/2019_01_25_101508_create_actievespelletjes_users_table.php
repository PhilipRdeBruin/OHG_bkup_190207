<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActievespelletjesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actievespelletjes_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('act_spel_id');
            $table->unsignedInteger('speler_id');
            $table->string('rol')->nullable();
            $table->unsignedInteger('bevestigd');
            $table->foreign('act_spel_id')->references('id')->on('actievespelletjes');
            $table->foreign('speler_id')->references('id')->on('users');
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
        Schema::dropIfExists('actievespelletjes_users');
    }
}
