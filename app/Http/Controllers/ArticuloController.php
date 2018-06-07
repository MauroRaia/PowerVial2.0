<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CrearArticuloRequest;
use App\Http\Requests\EditarArticuloRequest;
use App\Articulo;
use App\Familia;
use App\Proveedor;
use App\SubFamilia;
use App\MarcaMaquina;
use App\ModeloMaquina;
use Illuminate\Support\Facades\Schema;
use Storage;
use Intervention\Image\Facades\Image;
use Session;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $filtro = ['codigo' => 'Codigo',
                 'familia_id' => 'Familia',
                 'subfamilia_id' => 'Subfamilia',
                 'descripcion' => 'Descripcion',
                 'nombre' => 'Nombre',
                 'categoria' => 'Categoria',
                 'marca_maquina_id' => 'Marca',
                 'modelos_articulos' => 'Modelo'
                ];

      $articulos = [];
      $allArticulos = Articulo::all();
      $ultimosArticulos = Articulo::orderBy('created_at', 'desc');
      return view('articulos.indexArticulo', ['art' => $allArticulos, 'filtro' => $filtro, 'ultimosArticulos' => $ultimosArticulos]);
    }


    public function find(Request $request)
    {
      $filtro = ['codigo' => 'Codigo',
                 'familia_id' => 'Familia',
                 'subfamilia_id' => 'Subfamilia',
                 'descripcion' => 'Descripcion',
                 'nombre' => 'Nombre',
                 'categoria' => 'Categoria',
                 'modelos_articulos' => 'Modelo',
                 'marca_maquina_id' => 'Marca'
                ];


      //Caso si se busca un modelo, por cada elemento de Articulo,
      //busco en sus modelos asignados si contiene el string que le paso
      if (($request->input('field')) == 'modelos_articulos'){
        $all = Articulo::all();
        $strToFilter = $request->input('value');
        $articulos = [];

        foreach ($all as $a) {

          if (strpos($a->modelos_articulos, $strToFilter) !== false) {
            array_push($articulos, $a);
            } //end segundo if
          }//end foreach
        return view('articulos.indexArticulo', ['art' => $articulos, 'filtro' => $filtro]);
      }//end primer if

      //Caso si se busca una descripcion, por cada elemento de Articulo,
      //busco en su descripcion si contiene el string que le paso
      if (($request->input('field')) == 'descripcion'){
        $all = Articulo::all();
        $strToFilter = $request->input('value');
        $articulos = [];

        foreach ($all as $a) {

          if (strpos($a->descripcion, $strToFilter) !== false) {
            array_push($articulos, $a);
          } //end segundo if
        }//end foreach
        return view('articulos.indexArticulo', ['art' => $articulos, 'filtro' => $filtro]);
      }//end primer if

      //Caso si busco filtrar por familia, como paso el nombre, tengo que
      //buscar el objeto en Familia que corresponde al nombre que le doy
      if (($request->input('field')) == 'familia_id') {
        $value = Familia::where('nombre', ($request->input('value')) )->first();
        $field = $request->input('field');

        $articulos = Articulo::where($field, $value->id)->get();

        return view('articulos.indexArticulo', ['art' => $articulos, 'filtro' => $filtro]);
      }

      //Caso si busco filtrar por subfamilia, como paso el nombre, tengo que
      //buscar el objeto en SubFamilia que corresponde al nombre que le doy
      elseif (($request->input('field')) == 'subfamilia_id') {
        $value = SubFamilia::where('nombre', ($request->input('value')) )->first();
        $field = $request->input('field');

        $articulos = Articulo::where($field, $value->id)->get();

        return view('articulos.indexArticulo', ['art' => $articulos, 'filtro' => $filtro]);
      }

      //Caso si se busca una marca, por cada elemento de Articulo,
      //busco en su marca si contiene el string que le paso

      elseif (($request->input('field')) == 'marca_maquina_id') {
        $value = MarcaMaquina::where('nombre', ($request->input('value')) )->first();
        $field = $request->input('field');

        $articulos = Articulo::where($field, $value->id)->get();

        return view('articulos.indexArticulo', ['art' => $articulos, 'filtro' => $filtro]);
      }

      //caso si busco filtrar por categoria, en cada articulo
      //busco en su categoria si contiene el string que le paso
      elseif (($request->input('field')) == 'categoria'){
        $all = Articulo::all();
        $strToFilter = $request->input('value');
        $articulos = [];

        foreach ($all as $a) {

          if (strpos($a->categoria, $strToFilter) !== false) {
            array_push($articulos, $a);
          } //end segundo if
        }//end foreach
        return view('articulos.indexArticulo', ['art' => $articulos, 'filtro' => $filtro]);
      }//end primer if

      //Caso en el que busco por cualquier otro campo
      else {

        $field = $request->input('field');
        $value = $request->input('value');
        $articulos = Articulo::where($field, $value)->get();

        return view('articulos.indexArticulo', ['art' => $articulos, 'filtro' => $filtro]);
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familias = Familia::pluck('nombre','id');
        $proveedores = Proveedor::pluck('nombre_comercial','id');
        $marcas = MarcaMaquina::pluck('nombre','id');
        $subfamilias = SubFamilia::pluck('nombre', 'id');


        return view('articulos.createArticulo', ['proveedores' => $proveedores,
                                                'familias' => $familias,
                                                'marcas' => $marcas,
                                                'subfamilias' => $subfamilias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearArticuloRequest $request)

     {
       $articulo = new Articulo;
       $articulo->codigo = $request->input('codigo');
       $articulo->nombre = $request->input('nombre');
       $articulo->descripcion = $request->input('descripcion');
       $articulo->categoria = $request->input('categoria');
       $articulo->marca_maquina_id = $request->input('marca_maquina_id');
       $articulo->stock = $request->input('stock');
       $articulo->proveedor_id = $request->input('proveedor_id');
       $articulo->subfamilia_id = $request->input('subfamilia_id');
       $articulo->familia_id = $request->input('familia_id');
       $articulo->precio_venta = $request->input('precio_venta');
       $articulo->precio_compra = $request->input('precio_compra');
       $articulo->modelos_articulos = $request->input('modelos_articulos');


       //guardar imagen
       if($request->hasFile('imagen')){
           $imagen = $request->file('imagen');
           $filename = time() . '-' . ($articulo->nombre) . '.' . $imagen->getClientOriginalExtension();
           $location = public_path('images/articulos/' . $filename);
           Image::make($imagen->getRealPath())->resize(300, 300)->save($location);
           $articulo->imagen = $filename;
       }

       $articulo->save(); //Se hace un save para que exista el objeto => tiene
                          //una id => puedo relacionarlo con otros objetos

       if($request->has('reemplazos')){
           $codigos = $request->input('reemplazos');
           $cod_array = explode(',', $codigos); //explode separa un string segun el
                                                //primer parametro que le paso
           foreach ($cod_array as $c) {
             $articulo->add_reemplazo($c);
           }
       }

       $articulo->save();

       Session::flash('success', 'El articulo se ha creado correctamente');
       return redirect('/articulos/create');
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
      $proveedores = Proveedor::pluck('nombre_comercial','id');
      $familias = Familia::pluck('nombre', 'id');
      $subfamilias = SubFamilia::pluck('nombre', 'id');
      $marcas = MarcaMaquina::pluck('nombre', 'id');
      $articulo = Articulo::findOrFail($id);
      $codigos = [];

      foreach ($articulo->mi_reemplazo as $r) {
        array_push($codigos, $r->codigo);
      }

      $codigos = implode(',',$codigos);

      return view('articulos.editArticulo', ['articulo' => $articulo,
                                             'proveedores' => $proveedores,
                                             'subfamilias' => $subfamilias,
                                             'familias' => $familias,
                                             'marcas' => $marcas,
                                             'codigos' => $codigos,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(EditarArticuloRequest $request, $id)
     {
       $articulo = Articulo::find($id);
       $articulo->codigo = $request->input('codigo');
       $articulo->nombre = $request->input('nombre');
       $articulo->descripcion = $request->input('descripcion');
       $articulo->categoria = $request->input('categoria');
       $articulo->stock = $request->input('stock');
       $articulo->proveedor_id = $request->input('proveedor_id');
       $articulo->subfamilia_id = $request->input('subfamilia_id');
       $articulo->familia_id = $request->input('familia_id');
       $articulo->precio_venta = $request->input('precio_venta');
       $articulo->precio_compra = $request->input('precio_compra');
       $articulo->marca_maquina_id = $request->input('marca_maquina_id');
       $articulo->modelos_articulos = $request->input('modelos_articulos');


       //edicion imagen
       if($request->imagen){
           $imagen = $request->file('imagen');
           $filename = time() . '-' . $articulo->nombre . '.' . $imagen->getClientOriginalExtension();
           $location = public_path('images/articulos/' . $filename);
           Image::make($imagen->getRealPath())->resize(300, 300)->save($location);
           $oldfilename = $articulo->imagen;
           //actualizo base
           $articulo->imagen = $filename;
           //eliminar foto vieja
           Storage::delete($oldfilename);
       }

       $articulo->save(); //Se hace un save para que exista el objeto => tiene
                          //una id => puedo relacionarlo con otros objetos

       if($request->has('reemplazos')){

           //Elimino los articulos que ya estaban relacionados con el articulo
           foreach ($articulo->mi_reemplazo as $r) {
             $articulo->remove_reemplazo($r->codigo);
           }

           $codigos = $request->input('reemplazos');
           $cod_array = explode(',', $codigos); //explode separa un string segun el
                                                //primer parametro que le paso
           foreach ($cod_array as $c) {
             $articulo->add_reemplazo($c);
           }
       }

       $articulo->save();

       Session::flash('success', 'El articulo se ha actualizado correctamente');

       return redirect('/articulos');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $articulo = Articulo::find($id);
      Storage::delete($articulo->imagen);

      $articulo->delete();

      Session::flash('success', 'El articulo se ha eliminado correctamente');
      return redirect('/articulos');
    }

    public function descontarStock($id, $cantidad){

      //$articulo = Articulo::find($id);
      //$stockActual = $articulo->stock;
      //$articulo->stock = $stockActual - $cantidad;
      //$articulo->save();
    }


}
