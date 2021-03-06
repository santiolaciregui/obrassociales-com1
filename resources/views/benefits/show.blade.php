<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')

<style>
    table {
        width: 100%;
    }

    @media (max-width: 768px) {

        tr th:nth-child(4),
        tr td:nth-child(4) {
            display: none;
        }
    }
</style>

@if(session()->has('mensaje'))
    <div class="alert alert-success">
        {{ session()->get('mensaje') }}
    </div>
@endif
<html>
<div class=container>
    <table class="table align-middle">
        <h1>Administrar prestaciones</h1>
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col"><a href="{{route('benefit.create')}}" class="btn btn-light">Agregar nuevo</a>
                <th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestaciones as $prestacion)
            <tr>
                <td>{{$prestacion['nombre']}}</td>
                <td>
                    @if ($show[$prestacion->nombre])
                        <a href="{{route('benefit.delete',$prestacion->id)}}" class="btn btn-light">Eliminar</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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

