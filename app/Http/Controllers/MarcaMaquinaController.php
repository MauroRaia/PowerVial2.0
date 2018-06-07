<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CrearMarcaMaquinaRequest;
use App\Http\Requests\EditarMarcaMaquinaRequest;
use App\MarcaMaquina;
use Session;

class MarcaMaquinaController extends Controller
{
  public function create(){
    return view('marcasMaquina.createMarcaMaquina');
  }

  public function store(CrearMarcaMaquinaRequest $request) {
    $marca = MarcaMaquina::create($request->all());

    Session::flash('success', 'La marca se ha creado correctamente');
    return redirect('/marca_maquina');
    }

  public function edit($id){
    return view('marcasMaquina.editMarcaMaquina', ['marcaMaquina' => MarcaMaquina::find($id)]);
  }

  public function update(EditarMarcaMaquinaRequest $request, $id){
    $marcaMaquina = MarcaMaquina::find($id);
    $marcaMaquina->fill($request->all());
    $marcaMaquina->save();

    Session::flash('success', 'La marca se ha actualizado correctamente');
    return redirect('marcasMaquina');
  }

  public function destroy($id){
    $marcaMaquina = MarcaMaquina::find($id);
    $marcaMaquina->delete();

    return redirect('marcasMaquina');
  }

  public function index(){
    $marcasMaquina = MarcaMaquina::all();

    return view('marcasMaquina.indexMarcaMaquina', ['marc' => $marcasMaquina]);
  }
}
