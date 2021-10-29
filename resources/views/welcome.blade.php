@extends('layouts.main')
@section('contenedor')
@if(Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
<html style="text-align-last: center">
<div class="btn-group" role="group" aria-label="Basic outlined example" >
    @if(Auth::user()->hasRole('administrador'))
    <a class="btn btn-light btn-lg" type="button" href="/plan-management/create">Alta plan</a>
    <a class="btn btn-light btn-lg" type="button" href="/plan-management/">Modificar plan</a>
    <a class="btn btn-light btn-lg" type="button" href="/benefits">Administrar prestaciones</a>
    @endif
    @if(Auth::user()->hasRole('empleado'))
    <a class="btn btn-light btn-lg" type="button" href="/client-management/create">Alta cliente</a>
    <a class="btn btn-light btn-lg" type="button" href="/client-management/">Modificar cliente</a>
    <a class="btn btn-light btn-lg" type="button" href="/reintegros">Reintegros</a>
    @endif

    @if(count(App\Models\Cliente::where('email', Auth::user()->email)->get()) > 0)
    @if(App\Models\Cliente::where('email', Auth::user()->email)->get()[0]->id === App\Models\Cliente::where('email', Auth::user()->email)->get()[0]->id_titular)
    <a href="{{route('client.update_plan', ['id' => App\Models\Cliente::where('email', Auth::user()->email)->get()[0]->id])}}" class="btn btn-light btn-lg">Cambiar Plan</a>
    <a href="{{route('family.list', ['id_titular' => App\Models\Cliente::where('email', Auth::user()->email)->get()[0]->id])}}" class="btn btn-light btn-lg">Administrar familiares</a>
    <a class="btn btn-light btn-lg" type="button" href="/cupon/create">Generar cupon de pago</a>
    @endif
    @endif

    @if(Auth::user()->hasRole('cliente'))
    <a class="btn btn-light btn-lg" type="button" href="/reintegro/create">Solicitar aprobación de reintegro</a>
    <a class="btn btn-light btn-lg" type="button" href="/prestacion/create">Solicitar aprobación de prestación</a>
    
    @endif
</div>

</html>
@endsection

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 2000);
</script>
