<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
    <html>
    <h2>Solicitar aprobación de prestación</h2>
    <form action="{{route('prestacion.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>DNI</label>
            <input type="number" class="form-control" name="dni" placeholder="{{ $client->dni }}" disabled>
        </div>
        <div>
            <label>Numero de afiliado</label>
            <input type="number" class="form-control" name="numero_afiliado" placeholder="{{ $client->id }}" disabled>
        </div>
        <div class="form-group">
            <label>Plan</label>
            <select class="form-control" name="plan" disabled>
                <option value="{{$client->plan_id}}" selected>{{ $plan->nombre }}</option>
            </select>
        </div>
        <div>
            <label>Fecha de envio de solicitud</label>
            <div class="input-group date" name="fecha_solicitud" data-provide="datepicker">
                <input type="date" class="form-control" value="{{ $today }}" name="fecha_solicitud" disabled>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
        <div>
            <label>Autorización</label>
            <input type="file" class="form-control" name="autorizacion" accept="image/jpeg image/jpg" required>
            @error('autorización')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <br>
        <td>
            <button type="submit" class="btn btn-dark">Finalizar solicitud de prestación</button>
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
