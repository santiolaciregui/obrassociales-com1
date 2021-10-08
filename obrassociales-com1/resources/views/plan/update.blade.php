<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
<html>
<h2>modificar plan</h2>
<form action="{{route('plan.patch', ['id' => $plan->id])}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
  <label>Nombre</label>
  <input type="text" class="form-control" name="nombre" value="{{$plan->nombre}}">
  <hr>
  <div class="form-group">
    <label>Tipo</label>
    <select class="form-control" name="tipo" value="{{$plan->tipo}}">
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
    </select>
  </div>
  <hr>
  <label>Costo</label>
  <input type="number" class="form-control" name="costo" placeholder="1200" value="{{$plan->costo}}">
  <hr>
  <label>Prestaciones</label>
  <div>
    @foreach($prestaciones as $prestacion)
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="prestaciones[]" value="{{$prestacion['id']}}">
      <label class="form-check-label" for="inlineCheckbox1">
        {{$prestacion['nombre']}}
      </label>
    </div>
    @endforeach
  </div>
  <hr>
  <div>
    <label>Edad</label>
    <div>
    <label>desde</label>
    <input type="text" class="form-control" name="edad_desde" value="{{$plan->edad_desde}}">
    <label>hasta</label>
    <input type="text" class="form-control" name="edad_hasta" value="{{$plan->edad_hasta}}">
</div>
  </div>
  <hr>
  <div>
    <label>Beneficiario</label>
    <div class="form-group">
      <input type="radio" id="btnradio1" autocomplete="off" value="Individual" name="beneficiario" checked>
      <label for="btnradio1">Individual</label>
      <input type="radio" id="btnradio1" name="beneficiario" value="Pareja" autocomplete="off">
      <label for="btnradio1">Pareja</label>
      <input type="radio" id="btnradio1" name="beneficiario" value="Familia" autocomplete="off">
      <label for="btnradio1">Familia</label>
    </div>
  </div>
  <hr>
  <td>
    <button type="submit" class="btn btn-dark">Agregar</button>
  </td>
</form>

</html>

@endsection