<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <style type="text/css">
    .dropdown-toggle {
      height: 40px;
      /* min-inline-size: -webkit-fill-available; */
    }

    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
      width: max-content;
      inline-size: -webkit-fill-available;
    }
  </style>
</head>

<body>
  <h2>Alta de Plan</h2>
  <form action="{{route('plan.store')}}" method="POST">
    @csrf
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Plan A/Plan B/Plan C">
    <hr>
    <div class="form-group">
      <label>Tipo</label>
      <select class="form-control" name="tipo">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
      </select>
    </div>
    <hr>
    <label>Costo</label>
    <input type="number" class="form-control" name="costo" placeholder="1200">
    <hr>
    <label>Prestaciones</label>
    <div>
      <select class="selectpicker" multiple data-live-search="true" name="prestaciones[]">
        @foreach($prestaciones as $prestacion)
        <option value="{{$prestacion['id']}}">{{$prestacion['nombre']}}</option>
        @endforeach
      </select>
    </div>
    <hr>
    <div>
      <label>Edad</label>
      <div>
        <label>desde</label>
        <input type="text" class="form-control" name="edad_desde" placeholder="0">
        <label>hasta</label>
        <input type="text" class="form-control" name="edad_hasta" placeholder="50">
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
</body>

</html>

@endsection


<?php
if (isset($_POST['prestaciones'])) {
  print_r($_POST['prestaciones']);
}
?>