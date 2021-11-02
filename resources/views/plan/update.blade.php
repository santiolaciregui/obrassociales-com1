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
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<h2>Modificar plan</h2>
<form action="{{route('plan.patch', ['id' => $plan->id])}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
  <label>Nombre</label>
  <input type="text" class="form-control" name="nombre" value="{{$plan->nombre}}" required>
  <hr>
  <div class="form-group">
    <label>Tipo</label>
    <select class="form-control" name="tipo" value="{{$plan->tipo}}" required>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
    </select>
  </div>
  <hr>
  <label>Costo</label>
  <input type="number" class="form-control" name="costo" placeholder="1200" value="{{$plan->costo}}" required>
  <hr>
  <label>Prestaciones</label>
  <div>
      <select class="selectpicker" multiple data-live-search="true" name="prestaciones[]" required>
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
    <input type="text" class="form-control" name="edad_desde" value="{{$plan->edad_desde}}" required>
    <label>hasta</label>
    <input type="text" class="form-control" name="edad_hasta" value="{{$plan->edad_hasta}}" required>
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
  <td>
  <a href="javascript: history.go(-1)" class="btn btn-secondary">Regresar</a>
  </td>
</form>
</body>
</html>

@endsection


<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 2000);
</script>
