@extends('marcasNav')

@section('navtab_1', 'class=active')

@section('content-navtab')

@include('partials._messages')

<div class='row'>
  <div class='col-md-12'>
    <h3>Marcas</h3>
    <hr>
      <table class='table table-hover table-bordered'>
        <thead>
          <th class="col-xs-3">Nombre</th>
          <th class="col-xs-8">Modelos</th>
          <th class="col-xs-1"></th>
        </thead>
        <tbody>
      @foreach ($marc as $m)
        <tr>
          <th class="col-xs-3">{{ $m->nombre}}</th>
          <th class="col-xs-8">{{ $m->modelos}}</th>
          <th class="col-xs-1"> <a href="{{ url('marca_maquina/'.$m->id.'/edit') }}" class='btn btn-default'>Editar</a></th>
        </tr>
      @endforeach
    </tbody>
    </table>
  </div>
</div>

@endsection
