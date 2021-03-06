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
                <th scope="col">Nombre del cliente</th>
                <th scope="col">Nombre del profesional</th>
                <th scope="col">Fecha de solicitud</th>
                <th scope="col">Estado</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach(array_keys($reintegros) as $cliente)
                @foreach($reintegros[$cliente] as $reintegro)
                    <tr>
                        <td>{{$cliente}}</td>
                        <td>{{$reintegro['nombre_profesional']}}</td>
                        <td>{{$reintegro['fecha_solicitud']}}</td>
                        <td>{{$reintegro['estado']}}</td>
                        <td>
                            <a href="{{route('reintegro.update', ['id' => $reintegro->id])}}" class="btn btn-light">Ver</a>
                        </td>
                    </tr>
                @endforeach
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