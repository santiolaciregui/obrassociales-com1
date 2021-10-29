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
                <th scope="col">Nombre del cliente</th>
                <th scope="col">Nombre del profesional</th>
                <th scope="col">Fecha de solicitud</th>
                <th scope="col">Estado</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reintegros as $reintegro)
            <tr>
                <th scope="row">{{$reintegro['id_cliente']}} (deberia ser el nombre)</th>
                <td>{{$reintegro['nombre_profesional']}}</td>
                <td>{{$reintegro['fecha_solicitud']}}</td>
                <td>Pendiente (hardcodeado)</td>
                <td>
                    <a href="#" class="btn btn-light">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>
@endsection