<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name',66)->unique();
            $table->float('price',11,2)->default(0.0);
            $table->integer('user_id')->unsigned();//se crea el campo para la FK
            $table->date('expiration')->nullable();
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
        Schema::dropIfExists('products');
    }
}
