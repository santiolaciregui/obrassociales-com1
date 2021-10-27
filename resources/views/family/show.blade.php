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
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">DNI</th>
                <th scope="col">Plan</th>
                <th scope="col"><a href="{{route('familiar.create', ['id_titular' => $id_titular])}}" class="btn btn-light">Agregar nuevo</a><th>
            </tr>
        </thead>
        <tbody>
            @foreach($family as $familiar)
            <tr>
                <th scope="row">{{$familiar['id']}}</th>
                <td>{{$familiar['nombre']}}</td>
                <td>{{$familiar['apellido']}}</td>
                <td>{{$familiar['dni']}}</td>
                <td>{{$familiar['plan']->nombre}}</td>
                <td>
                    <a href="{{route('familiar.update_plan', ['id' => $familiar->id])}}" class="btn btn-light">Cambiar Plan</a>
                    <a href="{{route('familiar.delete',[$familiar->id,$id_titular])}}" class="btn btn-light">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>
@endsection