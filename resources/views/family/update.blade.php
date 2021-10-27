<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
<html>
<h2>Modificar usuario</h2>
<form action="{{route('familiar.patch', ['id' => $cliente->id] )}}" method="POST">
  @method('PATCH')
   @csrf
  <div>
    <label>DNI</label>
    <input type="text" class="form-control" name="dni" value="{{$cliente->dni}}">
    @error('dni')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
  <label>Editar contraseña</label>
  <br>
  <label for="inputPassword5" class="form-label">Contraseña actual</label>
  <input type="password" id="inputPassword5" class="form-control" name="contraseña" aria-describedby="passwordHelpBlock">
  @error('contraseña')
  <small>*{{$message}}</small>
  @enderror
  <label for="inputPassword5" class="form-label">Nueva contraseña</label>
  <input type="password" id="inputPassword5" class="form-control" name="contraseña_nueva" aria-describedby="passwordHelpBlock">
  </div>
  <hr>
  <div>
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}">
    @error('nombre')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido" value="{{$cliente->apellido}}">
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
    <div class="input-group date" name="fecha_nacimiento" data-provide="datepicker">
      <input type="date" class="form-control" name="fecha_nacimiento" value="{{$cliente->fecha_nacimiento}}">
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
    <input type="text" class="form-control" name="domicilio" value="{{$cliente->domicilio}}">
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
    <input type="text" class="form-control" name="email" value="{{$cliente->email}}">
    @error('email')
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