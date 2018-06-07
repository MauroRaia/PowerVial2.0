<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
    protected $fillable = ['codigo', 'nombre', 'descripcion', 'categoria',
                           'stock', 'proveedor_id', 'marca_maquina_id',
                           'subfamilia_id', 'familia_id', 'precio_compra',
                           'precio_venta', 'modelos'];

    public function marca_maquina(){
      return $this->belongsTo('App\MarcaMaquina');
    }


    public function familia(){
      return $this->belongsTo('App\Familia');
    }

    public function subfamilia(){
      return $this->belongsTo('App\SubFamilia');
    }

    public function proveedor(){
      return $this->belongsTo('App\Proveedor');
    }
    public function mi_reemplazo(){
      return $this->belongsToMany('App\Articulo', 'articulo_reemplazo', 'articulo_id', 'reemplazo_id');
    }

    public function add_reemplazo($codigo)
    {
        $reemplazo = Articulo::where('codigo', $codigo)->get();
        foreach ($reemplazo as $r) {
          $this->mi_reemplazo()->attach($r->id);
          $r->mi_reemplazo()->attach($this->id);
        }

    }
    public function remove_reemplazo($codigo)
    {
      $reemplazo = Articulo::where('codigo', $codigo)->get();
      foreach ($reemplazo as $r) {
        $this->mi_reemplazo()->detach($r->id);
        $r->mi_reemplazo()->detach($this->id);
      }
    }

}
