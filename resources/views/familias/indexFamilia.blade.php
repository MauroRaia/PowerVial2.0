@extends('familiasNav')

@section('navtab_1', 'class=active')

@section('content-navtab')

@include('partials._messages')

<div class='row'>
  <div class='col-md-12'>
    <h3>Familias</h3>
    <hr>
      <table class='table table-hover table-bordered'>
        <thead>
          <tr>
            <th class="col-xs-3">Nombre</th>
            <th class="col-xs-8">Subfamilias</th>
            <th class="col-xs-1"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($fam as $f)
            <tr>
              <th class="col-xs-3">{{ $f->nombre}}</th>
              <th class="col-xs-8">
              @foreach ($f->subfamilia as $subf)
                {{$subf->nombre}} |
              @endforeach
              </th>
              <th class="col-xs-1"> <a href="{{ url('familias/'.$f->id.'/edit') }}" class='btn btn-default'>Editar</a></th>
           </tr>
         @endforeach
        </tbody>
      </table>
  </div>
</div>
@endsection
