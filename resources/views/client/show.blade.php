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
                    <a href="{{route('familiar.list', ['id_titular' => $cliente->id])}}" class="btn btn-light">Administrar familiares</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>
@endsection