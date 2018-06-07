<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CrearSubfamiliaRequest;
use App\Http\Requests\EditarSubfamiliaRequest;
use App\SubFamilia;
use App\Familia;
use Session;

class SubfamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subf = SubFamilia::all();

        return view('subfamilias.indexSubfamilia', ['subf' => $subf]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familias = Familia::pluck('nombre', 'id');

        return view('subfamilias.createSubfamilia', ['familias' => $familias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearSubfamiliaRequest $request)
    {
      $subfamilia = Subfamilia::create($request->all());

      Session::flash('success', 'La subfamilia se ha creado correctamente');
      return redirect('/subfamilias/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familias = Familia::pluck('nombre', 'id');
        return view('subfamilias.editSubfamilia', ['subfamilia' => Subfamilia::findOrFail($id), 'familias' => $familias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditarSubfamiliaRequest $request, $id)
    {
      $subfamilia = Subfamilia::find($id);
      $subfamilia->fill($request->all());
      $subfamilia->save();

      Session::flash('success', 'La subfamilia se ha actualizado correctamente');
      return redirect('/subfamilias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $subfamilia = Subfamilia::find($id);
      $subfamilia->delete();

      return redirect('subfamilias');
    }
}
