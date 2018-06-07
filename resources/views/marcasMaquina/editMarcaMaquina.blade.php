@extends('marcasNav')

@section('navtab_2', 'class=active')

@section('content-navtab')

<div class='row'>
  <div class='col-md-8 col-md-offset-2'>
    @include('partials._messages')
    <h3>Ingresar informacion de la marca</h3>
    <hr>
    {!! Form::open(array('url' => 'marca_maquina/'.$marcaMaquina->id, 'method' => 'put')) !!}
      {{ Form::label('nombre', 'Nombre:') }}
      {{ Form::text('nombre', $marcaMaquina->nombre, array('class' => 'form-control')) }}
      {{ Form::label('nombre', 'Modelos (agregar cada modelo separado por una coma):') }}
      {{ Form::text('nombre', $marcaMaquina->modelos, array('class' => 'form-control')) }}
      {{Form::submit('Guardar marca', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;'))}}
    {!! Form::close() !!}

    {!! Form::open(['url' => 'marca_maquina/'.$marcaMaquina->id, 'method' => 'delete']) !!}
    {{ Form::submit('Eliminar', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;')) }}
    {!! Form::close() !!}
  </div>
</div>

@endsection
