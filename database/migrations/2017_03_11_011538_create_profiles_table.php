<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->text('address')->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('country', 45)->nullable();
            $table->string('website', 128)->nullable();
            $table->integer('user_id')->unsigned();//se crea el campo para la FK
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->OnDelete('cascade');// se establece la relación foranea y se definen las politicas para actualizar y borrar en cascada

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
