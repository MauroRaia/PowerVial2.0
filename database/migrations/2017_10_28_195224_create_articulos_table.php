<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('articulos', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('codigo', 30);
          $table->string('nombre', 75);
          $table->text('descripcion')->nullable();
          $table->integer('categoria')->nullable();
          $table->integer('stock');
          $table->integer('proveedor_id')->unsigned()->nullable();
          $table->integer('marca_maquina_id')->unsigned()->nullable();
          $table->integer('familia_id')->unsigned();
          $table->integer('subfamilia_id')->unsigned()->nullable();
          $table->string('imagen')->nullable();
          $table->integer('precio_compra')->default(0);
          $table->integer('precio_venta')->default(0);
          $table->string('modelos_articulos', 500)->nullable();

          $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('set null')->onUpdate('cascade');

          $table->foreign('subfamilia_id')->references('id')->on('subfamilias')->onDelete('set null')->onUpdate('cascade');

          $table->foreign('familia_id')->references('id')->on('familias')->onDelete('cascade')->onUpdate('cascade');

          $table->foreign('marca_maquina_id')->references('id')->on('marcas_maquina')->onDelete('set null')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
