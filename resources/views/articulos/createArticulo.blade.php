@extends('inventario')

@section('navtab_2', 'class=active')

@section('content-navtab')



<div class='row'>
  <div class='col-md-8 col-md-offset-2'>
    @include('partials._messages')
    <h3>Ingresar informacion del articulo</h3>
    <hr>
    {!! Form::open(array('route' => 'articulos.store', 'files' => true)) !!}

      {{ Form::label('codigo', 'Codigo:') }}
      {{ Form::text('codigo', null, array('class' => 'form-control')) }}

      {{ Form::label('nombre', 'Nombre:') }}
      {{ Form::text('nombre', null, array('class' => 'form-control')) }}

      {{ Form::label('imagen', 'Cargar imagen del articulo:') }}
      {{ Form::file('imagen', array('class' => 'btn-load-image', 'style' => 'margin-bottom:15px; margin-top:15px;')) }}

      {{ Form::label('descripcion', 'Descripcion:') }}
      {{ Form::textarea('descripcion', null, array('class' => 'form-control', 'style' => 'height:100px')) }}

      {{ Form::label('categoria', 'Categoria:') }}
      {{ Form::text('categoria', null, array('class' => 'form-control')) }}

      {{ Form::label('stock', 'Stock:') }}
      {{ Form::text('stock', null, array('class' => 'form-control')) }}

      {{ Form::label('precio_compra', 'Precio de compra:') }}
      {{ Form::text('precio_compra', 0, array('class' => 'form-control')) }}

      {{ Form::label('precio_venta', 'Precio de venta:') }}
      {{ Form::text('precio_venta', 0, array('class' => 'form-control')) }}

      {{ Form::label('reemplazos', 'Articulos que reemplaza (ingresar codigo del producto separado por una coma):') }}
      {{ Form::text('reemplazos', null, array('class' => 'form-control')) }}

      {{ Form::label('proveedor_id', 'Proveedor:') }}
      {{ Form::select('proveedor_id', $proveedores, null, array('class' => 'selectpicker')) }}

      {{ Form::label('marca_maquina_id', 'Marca:') }}
      {{ Form::select('marca_maquina_id', $marcas, null, array('class' => 'selectpicker')) }}

      {{ Form::label('modelos_articulos', 'Modelos (ingresar nombre del modelo separado por una coma):') }}
      {{ Form::text('modelos_articulos', null, array('class' => 'form-control')) }}

      {{ Form::label('familia_id', 'Familia:') }}
      {{ Form::select('familia_id', $familias, null, array('class' => 'selectpicker', 'id' => 'familia_in_form', 'onchange' => 'changeSubfamilia(this.value)')) }}
      <br>
      {{ Form::label('subfamilia_id', 'Subfamilia:') }}
      {{ Form::select('subfamilia_id', $subfamilias, null, array('class' => 'selectpicker')) }}


      {{Form::submit('Guardar articulo', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;'))}}
    {!! Form::close() !!}

  </div>
</div>


@endsection
