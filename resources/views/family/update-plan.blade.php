<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
<html>
<h2>Cambiar plan asociado al familiar</h2>
<form action="{{route('familiar.patch_plan', ['id' => $familiar->id, 'urlBack' => $urlBack] )}}" method="POST">
  @method('PATCH')
  @csrf
  <div>
    <label>DNI</label>
    <input type="text" class="form-control" name="dni" value="{{$familiar->dni}}" disabled>
  </div>
  <hr>
  <div>
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{$familiar->nombre}}" disabled>
  </div>
  <hr>
  <div>
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido" value="{{$familiar->apellido}}" disabled>
  </div>
  <hr>
  <div>
    <label>Plan Actual</label>
    <input type="text" class="form-control" name="apellido" value="{{$familiar->plan['nombre']}}" disabled>
  </div>
  <hr>

  <div class="form-group">
    <label>Seleccionar Plan</label>
    <select class="form-control" name="plan">
      @foreach($planes as $plan)
      <option value="{{$plan['id']}}">{{$plan['nombre']}}</option>
      @endforeach
    </select>
    @error('plan')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <td>
    <button type="submit" class="btn btn-dark">Finalizar modificacion de datos</button>
  </td>
</form>

</html>
@endsection