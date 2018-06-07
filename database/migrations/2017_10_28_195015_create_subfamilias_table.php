<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubfamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('subfamilias', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 30);
                  $table->integer('familia_id')->unsigned()->nullable();
                  $table->foreign('familia_id')->references('id')->on('familias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('subfamilias');
    }
}
