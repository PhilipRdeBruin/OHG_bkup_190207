<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcceptedToSpelletjes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spelletjes', function (Blueprint $table) {
            $table->string('alias');
            $table->string('rollen')->nullable();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spelletjes', function (Blueprint $table) {
            $table->dropColumn('alias');
            $table->dropColumn('rollen');
        });
    }
}
