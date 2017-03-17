<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlayeridOnMatchplayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matchplayers', function (Blueprint $table) {
            $table->foreign('PlayerID')->references('PlayerID')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matchplayers', function (Blueprint $table) {
            //
        });
    }
}
