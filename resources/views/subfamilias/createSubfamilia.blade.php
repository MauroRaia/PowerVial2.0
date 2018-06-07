@extends('familiasNav')

@section('navtab_4', 'class=active')

@section('content-navtab')


<div class='row'>
  <div class='col-md-8 col-md-offset-2'>
    @include('partials._messages')
    <h3>Ingresar informacion de la subfamilia</h3>
    <hr>
    {!! Form::open(array('route' => 'subfamilias.store')) !!}
      {{ Form::label('nombre', 'Nombre:') }}
      {{ Form::text('nombre', null, array('class' => 'form-control')) }}
      <br>
      {{ Form::label('familia_id', 'Familia:') }}
      {{ Form::select('familia_id', $familias, null, array('class' => 'selectpicker')) }}
      {{Form::submit('Guardar subfamilia', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px; margin-bottom:20px;'))}}
    {!! Form::close() !!}
  </div>
</div>

@endsection
