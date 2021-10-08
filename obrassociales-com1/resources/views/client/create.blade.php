<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
<html>
<h2>Alta de Usuario</h2>
<form action="{{route('client.store')}}" method="POST">
  @csrf
  <div>
    <label>DNI</label>
    <input type="text" class="form-control" name="dni" placeholder="43210124">
    @error('dni')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label for="inputPassword5" class="form-label">Contraseña</label>
    <input type="password" id="inputPassword5" class="form-control" name="contraseña" aria-describedby="passwordHelpBlock">
    @error('contraseña')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Martin">
    @error('nombre')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido" placeholder="Perez">
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
      <input type="date" class="form-control" name="fecha_nacimiento">
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
    <input type="text" class="form-control" name="domicilio" placeholder="Avenida Alem 7534">
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
    <label>Empresa</label>
    <input type="text" class="form-control" name="empresa" placeholder="Fragma">
    @error('empresa')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label>CUIL/CUIT</label>
    <input type="text" class="form-control" name="cuil" placeholder="20432101247">
    @error('cuil')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label>Telefono</label>
    <input type="text" class="form-control" name="telefono" placeholder="2914321012">
    @error('telefono')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <hr>
  <div>
    <label>Correo electrónico</label>
    <input type="text" class="form-control" name="email" placeholder="example@pss.com">
    @error('email')
    <small>*{{$message}}</small>
    @enderror
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
    <button class="btn btn-dark">Agregar familiar</button>
    <button type="submit" class="btn btn-dark">Finalizar carga de cliente</button>
  </td>
</form>

</html>
@endsection

