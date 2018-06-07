@extends('proveedoresNav')

@section('navtab_2', 'class=active')

@section('content-navtab')

<div class='row'>
  <div class='col-md-8 col-md-offset-2'>
    @include('partials._messages')
    <h3>Ingresar informacion del proveedor</h3>
    <hr>
    {!! Form::open(array('route' => 'proveedores.store')) !!}
      {{ Form::label('tipo_identificacion_fiscal', 'Tipo ident. fiscal.:') }}
      {{ Form::select('tipo_identificacion_fiscal', $tipos_identificacion_fiscal, array('class' => 'selectpicker')) }}
      {{ Form::label('numero_identificacion_fiscal', 'Num. ident. fiscal:') }}
      {{ Form::text('numero_identificacion_fiscal', null, array('class' => 'form-control')) }}
      {{ Form::label('razon_social', 'Razon Social:') }}
      {{ Form::text('razon_social', null, array('class' => 'form-control')) }}
      {{ Form::label('nombre_comercial', 'Nombre comercial:') }}
      {{ Form::text('nombre_comercial', null, array('class' => 'form-control')) }}
      {{ Form::label('domicilio', 'Domicilio:') }}
      {{ Form::text('domicilio', null, array('class' => 'form-control')) }}
      {{ Form::label('pais', 'Pais:') }}
      {{ Form::text('pais', null, array('class' => 'form-control')) }}
      {{ Form::label('provincia', 'Provincia:') }}
      {{ Form::text('provincia', null, array('class' => 'form-control')) }}
      {{ Form::label('localidad', 'Localidad:') }}
      {{ Form::text('localidad', null, array('class' => 'form-control')) }}
      {{ Form::label('codigo_postal', 'Codigo postal:') }}
      {{ Form::text('codigo_postal', null, array('class' => 'form-control')) }}
      {{ Form::label('telefono', 'Telefono:') }}
      {{ Form::text('telefono', null, array('class' => 'form-control')) }}
      {{ Form::label('movil', 'Telefono movil:') }}
      {{ Form::text('movil', null, array('class' => 'form-control')) }}
      {{ Form::label('nombre_contacto', 'Nombre de contacto:') }}
      {{ Form::text('nombre_contacto', null, array('class' => 'form-control')) }}
      {{ Form::label('email', 'Email:') }}
      {{ Form::text('email', null, array('class' => 'form-control')) }}
      {{ Form::label('direccion_web', 'Direccion web:') }}
      {{ Form::text('direccion_web', null, array('class' => 'form-control')) }}
      {{Form::submit('Guardar proveedor', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;'))}}

    {!! Form::close() !!}
  </div>
</div>

@endsection
