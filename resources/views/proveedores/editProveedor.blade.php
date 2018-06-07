@extends('proveedoresNav')

@section('navtab_2', 'class=active')

@section('content-navtab')

<div class='row'>
  <div class='col-md-8 col-md-offset-2'>
    @include('partials._messages')
    <h3>Ingresar informacion del proveedor</h3>
    <hr>
    {!! Form::open(array('route' => ['proveedores.update', $proveedor->id], 'method' => 'put')) !!}
      {{ Form::label('tipo_identificacion_fiscal', 'tipo ident. fiscal:') }}
      {{ Form::select('tipo_identificacion_fiscal', $tipos_identificacion_fiscal, $proveedor->tipo_identificacion_fiscal, array('class' => 'selectpicker')) }}
      {{ Form::label('numero_identificacion_fiscal', 'Num. ident. fiscal:') }}
      {{ Form::text('numero_identificacion_fiscal', $proveedor->numero_identificacion_fiscal, array('class' => 'form-control')) }}
      {{ Form::label('razon_social', 'Razon Social:') }}
      {{ Form::text('razon_social', $proveedor->razon_social, array('class' => 'form-control')) }}
      {{ Form::label('nombre_comercial', 'Nombre comercial:') }}
      {{ Form::text('nombre_comercial', $proveedor->nombre_comercial, array('class' => 'form-control')) }}
      {{ Form::label('domicilio', 'Domicilio:') }}
      {{ Form::text('domicilio', $proveedor->domicilio, array('class' => 'form-control')) }}
      {{ Form::label('pais', 'Pais:') }}
      {{ Form::text('pais', $proveedor->pais, array('class' => 'form-control')) }}
      {{ Form::label('provincia', 'Provincia:') }}
      {{ Form::text('provincia', $proveedor->provincia, array('class' => 'form-control')) }}
      {{ Form::label('localidad', 'Localidad:') }}
      {{ Form::text('localidad', $proveedor->localidad, array('class' => 'form-control')) }}
      {{ Form::label('codigo_postal', 'Codigo postal:') }}
      {{ Form::text('codigo_postal', $proveedor->codigo_postal, array('class' => 'form-control')) }}
      {{ Form::label('telefono', 'Telefono:') }}
      {{ Form::text('telefono', $proveedor->telefono, array('class' => 'form-control')) }}
      {{ Form::label('movil', 'Telefono movil:') }}
      {{ Form::text('movil', $proveedor->movil, array('class' => 'form-control')) }}
      {{ Form::label('nombre_contacto', 'Nombre de contacto:') }}
      {{ Form::text('nombre_contacto', $proveedor->nombre_contacto, array('class' => 'form-control')) }}
      {{ Form::label('email', 'Email:') }}
      {{ Form::text('email', $proveedor->email, array('class' => 'form-control')) }}
      {{ Form::label('direccion_web', 'Direccion web:') }}
      {{ Form::text('direccion_web', $proveedor->direccion_web, array('class' => 'form-control')) }}
      {{Form::submit('Guardar proveedor', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;'))}}
    {!! Form::close() !!}

    {!! Form::open(['url' => 'proveedores/'.$proveedor->id, 'method' => 'delete']) !!}
    {{ Form::submit('Eliminar', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;')) }}
    {!! Form::close() !!}
  </div>
</div>

@endsection
