@extends('layouts.main')
@section('contenedor')
<html style="text-align-last: center">
<div class="btn-group" role="group" aria-label="Basic outlined example" >
    @if(Auth::user()->hasRole('administrador'))
    <a class="btn btn-light btn-lg" type="button" href="/plan-management/create">Alta plan</a>
    <a class="btn btn-light btn-lg" type="button" href="/plan-management/">Modificar plan</a>
    @endif
    @if(Auth::user()->hasRole('empleado'))
    <a class="btn btn-light btn-lg" type="button" href="/client-management/create">Alta cliente</a>
    <a class="btn btn-light btn-lg" type="button" href="/client-management/">Modificar cliente</a>
    @endif
    @if(Auth::user()->id === Auth::user()->id_titular || Auth::user()->id_titular === null)
    <a class="btn btn-light btn-lg" type="button" href="/cupon/create">Generar cupon de pago</a>
    @endif
    @if(!Auth::user()->hasRole('empleado') && !Auth::user()->hasRole('administrador'))
    <a class="btn btn-light btn-lg" type="button" href="/client-management/create">Solicitar aprobación de reintegro</a>
    <a class="btn btn-light btn-lg" type="button" href="/client-management/create">Solicitar aprobación de prestación</a>
    @endif
</div>

</html>
@endsection
