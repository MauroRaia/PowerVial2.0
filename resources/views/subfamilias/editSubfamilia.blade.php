@extends('familiasNav')

@section('navtab_4', 'class=active')

@section('content-navtab')

<div class='row'>
  <div class='col-md-8 col-md-offset-2'>
    @include('partials._messages')
    <h3>Ingresar informacion de la subfamilia</h3>
    <hr>
    {!! Form::open(array('route' => ['subfamilias.update', $subfamilia->id], 'method' => 'put')) !!}
      {{ Form::label('nombre', 'Nombre:') }}
      {{ Form::text('nombre', $subfamilia->nombre, array('class' => 'form-control')) }}
      {{ Form::label('familia_id', 'Familia:') }}
      {{ Form::select('familia_id', $familias, $subfamilia->familia_id, array('class' => 'selectpicker')) }}
      {{Form::submit('Guardar subfamilia', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;'))}}
    {!! Form::close() !!}

    {!! Form::open(['url' => 'subfamilias/'.$subfamilia->id, 'method' => 'delete']) !!}
    {{ Form::submit('Eliminar', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;')) }}
    {!! Form::close() !!}
  </div>
</div>

@endsection
