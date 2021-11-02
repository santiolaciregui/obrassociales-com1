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
    <a class="btn btn-light btn-lg" type="button" href="/plan-management/create">Alta plan</a>
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
                    @if ($eliminar[$plan->id])
                    <a href="{{route('plan.delete', ['id_plan' => $plan->id])}}" class="btn btn-light">Eliminar</a>
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