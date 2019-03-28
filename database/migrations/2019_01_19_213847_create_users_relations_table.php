<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('users_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gebruiker');
            $table->unsignedInteger('vriend');
            $table->foreign('gebruiker')->references('id')->on('users');
            $table->foreign('vriend')->references('id')->on('users');
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
    Schema::dropIfExists('users_relations');
    }
}
