<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
@if(session()->has('mensaje'))
    <div class="alert alert-success">
        {{ session()->get('mensaje') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<html>
  
<h2>Alta de Empleado</h2>
<form action="{{route('empleado.store')}}" method="POST">
  @csrf
  <div>
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Martin" required>
    @error('nombre')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <div>
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido" placeholder="Perez" required>
    @error('apellido')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <div>
    <label>Correo electrónico</label>
    <input type="text" class="form-control" name="email" placeholder="example@pss.com" required>
    @error('email')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <div>
    <label for="inputPassword5" class="form-label">Contraseña</label>
    <input type="password" id="inputPassword5" class="form-control" name="contraseña" aria-describedby="passwordHelpBlock" required>
    @error('contraseña')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <td>
    <button type="submit" class="btn btn-dark">Finalizar carga de empleado</button>
  </td>
  <td>
    <a href="/client-management" class="btn btn-secondary">Regresar</a>
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
