<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcceptedToActievespelletjesusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actievespelletjes_users', function (Blueprint $table) {
            $table->boolean('bevestigd')->default(false);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actievespelletjes_users', function (Blueprint $table) {
             $table->dropColumn('bevestigd');
        });
    }
}
