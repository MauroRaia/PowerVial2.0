<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarcaMaquina extends Model
{
    protected $table = 'marcas_maquina';
    protected $fillable = ['nombre', 'modelos'];

    public function articulo(){
      return $this->hasMany('App\Articulo');
    }
    
    public function delete(){

      Articulo::where("familia_id", $this->id)->delete();
      ModeloMaquina::where('familia_id', $this->id)->delete();

      return parent::delete();
    }
}
