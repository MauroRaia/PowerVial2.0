@extends('familiasNav')

@section('navtab_3', 'class=active')

@section('content-navtab')

@include('partials._messages')

<div class='row'>
  <div class='col-md-12'>
    <h3>Subfamilias</h3>
    <hr>
      <table class='table table-hover table-bordered'>
        <thead>
          <th class="col-xs-11">Nombre</th>
          <th class="col-xs-1"></th>
        </thead>
        <tbody>
      @foreach ($subf as $s)
        <tr>
          <th class="col-xs-11">{{ $s->nombre}}</th>
          <th class="col-xs-1"> <a href="{{ url('subfamilias/'.$s->id.'/edit') }}" class='btn btn-default'>Editar</a></th>
        </tr>
      @endforeach
    </tbody>
    </table>
  </div>
</div>

@endsection
