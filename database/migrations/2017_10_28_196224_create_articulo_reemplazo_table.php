<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateArticuloReemplazoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_reemplazo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('articulo_id')->unsigned()->nullable();
            $table->foreign('articulo_id')->references('id')->on('articulos')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('reemplazo_id')->unsigned()->nullable();
            $table->foreign('reemplazo_id')->references('id')->on('articulos')
                  ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('articulo_reemplazo');
    }
}
