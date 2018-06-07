@extends('inventario')

@section('navtab_1', 'class=active')

@section('content-navtab')

@include('partials._messages')

<div class="panel panel-default">

<div class="panel-heading">Filtrar por</div>

<div class="panel-body">

<div class="row">

      <div class="col-md-12">

        {!! Form::open(array('route' => 'articulos.find')) !!}

        <div class="col-md-2">
          {{ Form::select('field', $filtro, null, ['class' => 'selectpicker']) }}
        </div>

        <div class="col-md-8">
          {{ Form::text('value', null, array('class' => 'form-control')) }}
        </div>

        <div class="col-md-2">
          {{ Form::submit('Buscar', array('class'=>'btn btn-primary btn-block'))}}
        </div>
        {!! Form::close() !!}

      </div>

</div>

</div>

</div>

<div class='row'>
  <div class='col-md-12'>
    <hr class="content">
    <h3>Articulos</h3>
    <hr class="content">
      <table class='table table-hover table-bordered'>
        <thead>
          <th class="col-xs-1">Codigo</th>
          <th class="col-xs-1">Nombre</th>
          <th class="col-xs-1">Stock</th>
          <th class="col-xs-1">Marca</th>
          <th class="col-xs-1">Familia</th>
          <th class="col-xs-1">Subfamilia</th>
          <th class="col-xs-2">Descripcion</th>
          <th class="col-xs-1">Precio de compra</th>
          <th class="col-xs-1">Precio de venta</th>
          <th class="col-xs-1"></th>
        </thead>
        <tbody>
      @foreach ($art as $a)
        <tr>
          <th class="col-xs-1">{{ $a->codigo}}</th>
          <th class="col-xs-1">{{ $a->nombre }}</th>
          <th class="col-xs-1">{{ $a->stock }}</th>
          <th class="col-xs-1">{{ $a->marca_maquina->nombre }}</th>
          <th class="col-xs-1">{{ $a->familia->nombre }}</th>
          <th class="col-xs-1">{{ $a->subfamilia->nombre }}</th>
          <th class="col-xs-2">{{ $a->descripcion }}</th>
          <th class="col-xs-1">{{ $a->precio_compra }}</th>
          <th class="col-xs-1">{{ $a->precio_venta }}</th>
          <th class="col-xs-1"><button type="button" class="btn btn-show" data-toggle="modal" data-target= {{"#myModal" . $a->id}} >Ver</button></th>



          <!-- Modal -->
          <div id= {{ 'myModal' . $a->id}} class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style="background-color: #0B3861; color:#FAFAFA;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Codigo: {{$a->codigo}}</h4>
                </div>
                  <div class="col-md-12" style="margin-top:20px;">

                      <div class="col-md-4">


                      <li><p>Nombre: <span style="text-decoration:underline;">{{$a->nombre}}</span></p></li>
                      <li><p>Stock: <span style="text-decoration:underline;">{{$a->stock}}</span></p></li>
                      <li><p>Familia: <span style="text-decoration:underline;">{{$a->familia->nombre}}</span></p></li>
                      <li><p>Subfamilia: <span style="text-decoration:underline;">{{$a->subfamilia->nombre}}</span></p></li>
                      <li><p>Marca: <span style="text-decoration:underline;">{{$a->marca_maquina->nombre}}</span></p></li>
                      <li><p>Modelos: <span style="text-decoration:underline;">{{$a->modelos_articulos}}</span></p></li>
                      <li><p>Proveedor: <span style="text-decoration:underline;">{{$a->proveedor->nombre_comercial}}</span></p></li>
                      <li><p>Descripcion: <span style="text-decoration:underline;">{{$a->descripcion}}</span></p></li>
                      <li><p>Categoria: <span style="text-decoration:underline;">{{$a->categoria}}</span></p></li>
                      <li><p>Precio de compra: <span style="text-decoration:underline;">{{$a->precio_compra}}</span></p></li>
                      <li><p>Precio de venta: <span style="text-decoration:underline;">{{$a->precio_venta}}</span></p></li>
                      <li><p>Articulos que reemplaza:</p></li>
                      <ul>
                      @foreach ($a->mi_reemplazo as $r)
                           <li><p><span style='text-decoration:underline;'>{{$r->codigo}} - {{$r->nombre}}</span></p></li>
                      @endforeach
                      </ul>

                      <a type='button' href="{{ url('articulos/'.$a->id.'/edit') }}" class="btn btn-show btn-block" style="margin-bottom:20px;">Editar</a>

                      </div>

                        <div class="col-md-8">
                            <img src= "{{ asset('images/articulos/' . $a->imagen) }}">
                        </div>

                  </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-show btn-block" data-dismiss="modal">Cerrar</button>
                </div>
              </div>

            </div>
          </div>

        </tr>
      @endforeach
    </tbody>
    </table>
  </div>
</div>



@endsection
