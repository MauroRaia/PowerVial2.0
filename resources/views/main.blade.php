<!DOCTYPE html>
<html lang="en">
  <head>

    @include('partials._stylesheet')

  </head>
<body>

<div class="">
      <img src="{{ asset('images/jumbotron-image-2.jpg') }}" widht='1349' height='392' alt="">
</div>

@include('partials._navigation')

<div class="col-md-12">
  <div class='well well-lg'>
  @yield('content')
  </div>
</div>

</div>

@include('partials._scripts')
</body>
</html>
