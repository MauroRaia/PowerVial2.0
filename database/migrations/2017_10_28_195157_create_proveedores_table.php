<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('proveedores', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('tipo_identificacion_fiscal')->nullable();
          $table->string('numero_identificacion_fiscal')->nullable();
          $table->string('razon_social', 125)->nullable();
          $table->string('nombre_comercial', 100)->nullable();
          $table->string('domicilio', 100)->nullable();
          $table->string('pais', 75)->nullable();
          $table->string('provincia', 75)->nullable();
          $table->string('localidad', 75)->nullable();
          $table->integer('codigo_postal')->unsigned();
          $table->string('telefono', 30)->nullable();
          $table->string('movil', 30)->nullable();
          $table->string('nombre_contacto', 20)->nullable();
          $table->string('email', 75)->nullable();
          $table->string('direccion_web', 50)->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
