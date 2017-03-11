<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned(); // Llave foranea
            $table->integer('group_id')->unsigned();// Llave foranea

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users') // FK
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups') // FK
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_user');
    }
}
