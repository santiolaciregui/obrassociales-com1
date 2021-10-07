@extends('layouts.main')
@section('contenedor')
<html>


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="d-grid gap-2" style="text-align: center;">
                @if(Auth::user()->hasRole('administrador'))
                    <a class="btn btn-primary" type="button" href="/plan-management/create">Alta plan</a>
                    <a class="btn btn-primary" type="button" href="/plan-management/">Modificar plan</a>
                @endif
                @if(Auth::user()->hasRole('empleado'))
                    <a class="btn btn-primary" type="button" href="/client-management/create">Alta cliente</a>
                    <a class="btn btn-primary" type="button" href="/client-management/">Modificar cliente</a>
                @endif
                </div>
            </div>
        </div>
    </div>
</html>
@endsection