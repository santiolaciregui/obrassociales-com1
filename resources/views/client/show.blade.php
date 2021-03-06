<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')

<style>
table{
  width:100%;
}
  @media (max-width: 768px){
    tr th:nth-child(4),tr td:nth-child(4){
      display:none;
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
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">DNI</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <th scope="row">{{$cliente['id']}}</th>
                <td>{{$cliente['nombre']}}</td>
                <td>{{$cliente['apellido']}}</td>
                <td>{{$cliente['dni']}}</td>
                <td>
                    <a href="{{route('client.update', ['id' => $cliente->id])}}" class="btn btn-light">Editar Datos</a>
                    <a href="{{route('client.update_plan', ['id' => $cliente->id])}}" class="btn btn-light">Cambiar Plan</a>
                    <a href="{{route('family.list', ['id_titular' => $cliente->id])}}" class="btn btn-light">Administrar familiares</a>
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
