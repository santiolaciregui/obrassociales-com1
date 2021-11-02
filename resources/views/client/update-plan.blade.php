<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<html>
<h2>Cambiar plan asociado al usuario</h2>
<form action="{{route('client.patch_plan', ['id' => $cliente->id] )}}" method="POST">
  @method('PATCH')
  @csrf
  <div>
    <label>DNI</label>
    <input type="text" class="form-control" name="dni" value="{{$cliente->dni}}" disabled>
  </div>
  <hr>
  <div>
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}" disabled>
  </div>
  <hr>
  <div>
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido" value="{{$cliente->apellido}}" disabled>
  </div>
  <hr>
  <div>
    <label>Plan Actual</label>
    <input type="text" class="form-control" name="apellido" value="{{$cliente->plan['nombre']}}" disabled>
  </div>
  <hr>

  <div class="form-group">
    <label>Seleccionar Plan</label>
    <select class="form-control" name="plan" >
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

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 2000);
</script>
