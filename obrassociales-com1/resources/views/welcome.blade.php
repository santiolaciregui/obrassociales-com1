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
    @if(Auth::user()->id === Auth::user()->id_familiar)
    <a class="btn btn-light btn-lg" type="button" href="/client-management/create">Generar cupon de pago</a>
    @endif
</div>

</html>
@endsection
