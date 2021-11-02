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
<h2>Crear nueva prestacion</h2>
<form action="{{route('benefit.store')}}" method="POST">
  @csrf
  <div>
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Farmacologico" required>
    @error('nombre')
    <small>*{{$message}}</small>
    @enderror
  </div>
  <br>
  <td>
    <button type="submit" class="btn btn-dark">Finalizar y crear</button>
  </td>
  <td>
    <a href="javascript: history.go(-1)" class="btn btn-secondary">Regresar</a>
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