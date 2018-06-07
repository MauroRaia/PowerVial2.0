@extends('proveedoresNav')

@section('navtab_1', 'class=active')

@section('content-navtab')

@include('partials._messages')

<div class='row'>
  <div class='col-md-12'>
    <h3>Proveedores</h3>
    <hr>
      <table class='table table-hover table-bordered'>
        <thead>
          <th class="col-xs-1">Id Fiscal</th>
          <th class="col-xs-1">Num Id Fiscal</th>
          <th class="col-xs-2">Nombre comercial</th>
          <th class="col-xs-1">Telefono</th>
          <th class="col-xs-2">Movil</th>
          <th class="col-xs-2">Email</th>
          <th class="col-xs-2">Web</th>
          <th class="col-xs-1"></th>
        </thead>
        <tbody>
      @foreach ($prov as $p)
        <tr>
          <th class="col-xs-1">{{ $p->tipo_identificacion_fiscal}}</th>
          <th class="col-xs-1">{{ $p->numero_identificacion_fiscal }}</th>
          <th class="col-xs-2">{{ $p->nombre_comercial }}</th>
          <th class="col-xs-2">{{ $p->telefono }}</th>
          <th class="col-xs-2">{{ $p->movil }}</th>
          <th class="col-xs-2">{{ $p->email }}</th>
          <th class="col-xs-2">{{ $p->direccion_web }}</th>
          <th class="col-xs-1"> <a href="{{ url('proveedores/'.$p->id.'/edit') }}" class='btn btn-default'>Editar</a></th>
        </tr>
      @endforeach
    </tbody>
    </table>
  </div>
</div>

@endsection
