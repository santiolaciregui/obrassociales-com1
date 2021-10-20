<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
<html>
<h2>Crear nueva prestacion</h2>
<form action="{{route('benefit.store')}}" method="POST">
  @csrf
  <div>
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Farmacologico">
    @error('nombre')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <br>
  <td>
    <button type="submit" class="btn btn-dark">Finalizar y crear</button>
  </td>
</form>

</html>
@endsection