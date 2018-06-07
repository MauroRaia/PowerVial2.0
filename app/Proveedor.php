<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = ['tipo_identificacion_fiscal',
                           'numero_identificacion_fiscal', 'razon_social',
                           'nombre_comercial', 'domicilio', 'pais', 'provincia',
                           'localidad', 'codigo_postal', 'telefono', 'movil',
                           'nombre_contacto', 'email', 'direccion_web'];

    public function articulo(){
      return $this->hasMany('App\Articulo');
    }
    public function delete(){

      Articulo::where("proveedor_id", $this->id)->delete();

      return parent::delete();
    }
}
