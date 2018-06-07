<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubFamilia extends Model
{
    protected $table = 'subfamilias';
    protected $fillable = ['nombre', 'familia_id'];

    public function familias(){

      return $this->belongsTo('App\Familia');
    }
    public function articulo(){
      return $this->hasMany('App\Articulo');
    }
    public function delete(){

      Articulo::where("subfamilia_id", $this->id)->delete();

      return parent::delete();
    }
}
