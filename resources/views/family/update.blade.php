<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<html>
<h2>Modificar usuario</h2>
<form action="{{route('familiar.patch', ['id' => $cliente->id] )}}" method="POST">
  @method('PATCH')
   @csrf
  <div>
    <label>DNI</label>
    <input type="text" class="form-control" name="dni" value="{{$cliente->dni}}" required>
    @error('dni')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
  <label>Editar contraseña</label>
  <br>
  <label for="inputPassword5" class="form-label">Contraseña actual</label>
  <input type="password" id="inputPassword5" class="form-control" name="contraseña" aria-describedby="passwordHelpBlock" required>
  @error('contraseña')
  <small>*{{$message}}</small>
  @enderror
  <label for="inputPassword5" class="form-label">Nueva contraseña</label>
  <input type="password" id="inputPassword5" class="form-control" name="contraseña_nueva" aria-describedby="passwordHelpBlock" required>
  </div>
  <hr>
  <div>
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}" required>
    @error('nombre')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido" value="{{$cliente->apellido}}" required>
    @error('apellido')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label>Sexo</label>
    <div class="form-group">
      <input type="radio" id="btnradio1" name="sexo" value="Femenino" autocomplete="off" checked>
      <label for="btnradio1">Femenino</label>
      <input type="radio" id="btnradio1" name="sexo" value="Masculino" autocomplete="off">
      <label for="btnradio1">Masculino</label>
      <input type="radio" id="btnradio1" name="sexo" value="Otro" autocomplete="off">
      <label for="btnradio1">Otro</label>
    </div>
    @error('sexo')
      <small>*{{$message}}</small>
      @enderror
  </div>
  <hr>
  <div>
    <label>Fecha de nacimiento</label>
    <div class="input-group date" name="fecha_nacimiento" data-provide="datepicker" >
      <input type="date" class="form-control" name="fecha_nacimiento" value="{{$cliente->fecha_nacimiento}}" required>
      <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
      </div>
    </div>
    @error('fecha_nacimiento')
      <small>*{{$message}}</small>
      @enderror
  </div>
  <hr>
  <div>
    <label>Domicilio</label>
    <input type="text" class="form-control" name="domicilio" value="{{$cliente->domicilio}}" required>
    @error('domicilio')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label>Estado civil</label>
    <div class="form-group">
      <input type="radio" id="btnradio1" name="estado_civil" value="soltera/o" autocomplete="off" checked>
      <label for="btnradio1">Soltera/o</label>
      <input type="radio" id="btnradio1" name="estado_civil" value="casada/o" autocomplete="off">
      <label for="btnradio1">Casada/o</label>
    </div>
    @error('estado_civil')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label>Correo electrónico</label>
    <input type="text" class="form-control" name="email" value="{{$cliente->email}}" required>
    @error('email')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <td>
    <button type="submit" class="btn btn-dark">Finalizar modificacion de datos</button>
  </td>
  <td>
  <a href="javascript: history.go(-1)" class="btn btn-secondary">Cancelar</a>
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
