<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_modules', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('create')->default(false)->nullable();
            $table->boolean('view')->default(false)->nullable();
            $table->boolean('update')->default(false)->nullable();
            $table->boolean('delete')->default(false)->nullable();

            $table->integer('id_groups')->unsigned();
            $table->foreign('id_groups')->references('id')->on('groups')->onDelete('cascade');

            $table->integer('id_modules')->unsigned();
            $table->foreign('id_modules')->references('id')->on('modules')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups_modules');
    }
}
