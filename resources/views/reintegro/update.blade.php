<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
<html>
<h2>Solicitud de reintegro</h2>
<ul>
  <li>ID de reintegro: {{$solicitud->id}}</li>
  <li>Nombre del cliente: {{$nombre_cliente}}</li>
  <li>Nombre del profesional: {{$solicitud->nombre_profesional}}</li>
  <li>Importe facturado: {{$solicitud->importe_facturado}}</li>
  <li>Fecha solicitud: {{$solicitud->fecha_solicitud}}</li>
  <li>Estado: {{$solicitud->estado}}</li>
</ul>
@if($solicitud->estado == 'PENDIENTE')
<div>
  <a display="inline-block" href="{{route('reintegro.patch', ['id' => $solicitud->id, 'estado' => 'RECHAZADA'])}}" class="btn btn-dark">Rechazar</a>
  <a display="inline-block" href="{{route('reintegro.patch', ['id' => $solicitud->id, 'estado' => 'ACEPTADA'])}}" class="btn btn-dark">Aceptar</a>
</div>
@endif

</html>
@endsection