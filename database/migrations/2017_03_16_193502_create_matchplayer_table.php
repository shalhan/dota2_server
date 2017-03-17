<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchplayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchplayers', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('MatchPlayerID');
            $table->integer('MatchID')->unsigned();
            $table->integer('PlayerID')->unsigned();
            $table->timestamps();
        });

        Schema::table('matchplayers', function (Blueprint $table){
            $table->foreign('MatchID')->references('MatchID')->on('matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matchplayers');
    }
}
