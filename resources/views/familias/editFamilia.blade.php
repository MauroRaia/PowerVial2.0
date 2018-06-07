@extends('familiasNav')

@section('navtab_2', 'class=active')

@section('content-navtab')


<div class='row'>
  <div class='col-md-8 col-md-offset-2'>
    @include('partials._messages')
    <h3>Ingresar informacion de la familia</h3>
    <hr>
    {!! Form::open(array('route' => ['familias.update', $familia->id], 'method' => 'put')) !!}
      {{ Form::label('nombre', 'Nombre:') }}
      {{ Form::text('nombre', $familia->nombre, array('class' => 'form-control')) }}
      {{ Form::submit('Guardar familia', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;')) }}
    {!! Form::close() !!}

    {!! Form::open(['url' => 'familias/'.$familia->id, 'method' => 'delete']) !!}
    {{ Form::submit('Eliminar', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;')) }}
    {!! Form::close() !!}
  </div>
</div>

@endsection
