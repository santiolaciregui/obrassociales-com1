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
                <th scope="col">Tipo del Plan</th>
                <th scope="col">Costo</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($planes as $plan)
            <tr>
                <th scope="row">{{$plan['id']}}</th>
                <td>{{$plan['nombre']}}</td>
                <td>{{$plan['tipo']}}</td>
                <td>{{$plan['costo']}}</td>
                <td>
                    <a href="{{route('plan.update', ['id' => $plan->id])}}" class="btn btn-light">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>
@endsection