<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration
{

    public function up()
    {
        Schema::create('weights', function(Blueprint $table) {

            $table->increments('id');
            $table->string('code');
            $table->integer('nro');
            $table->double('weight');
            $table->string('unit')->nullable();
            $table->string('observation')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('weights');
    }
}
