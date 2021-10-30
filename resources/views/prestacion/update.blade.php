<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
<html>
<h2>Solicitud de prestación</h2>
<ul>
  <li>ID de prestacion: {{$solicitud->id}}</li>
  <li>Nombre del cliente: {{$solicitud->nombre_cliente}}</li>
  <li>Fecha de solicitud: {{$solicitud->created_at}}</li>
  <li>Estado: {{$solicitud->estado}}</li>
  <li>imagen: {{$solicitud->image}}</li>
</ul>
@if($solicitud->estado == 'PENDIENTE')
<div>
  <a display="inline-block" href="{{route('prestacion.patch', ['id' => $solicitud->id, 'estado' => 'RECHAZADA'])}}" class="btn btn-dark">Rechazar</a>
  <a display="inline-block" href="{{route('prestacion.patch', ['id' => $solicitud->id, 'estado' => 'ACEPTADA'])}}" class="btn btn-dark">Aceptar</a>
</div>
@endif

</html>
@endsection