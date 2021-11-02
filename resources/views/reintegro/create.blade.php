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
    <h2>Solicitar aprobación de reintegro</h2>
    <form action="{{route('reintegro.store')}}" method="POST">
        @csrf
        <div>
            <label>DNI</label>
            <input type="number" class="form-control" name="dni" placeholder="{{ $client->dni }}" disabled>
        </div>
        <div>
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="{{ $client->nombre }}" disabled>
        </div>
        <div>
            <label>Apellido</label>
            <input type="text" class="form-control" name="apellido" placeholder="{{ $client->apellido }}" disabled>
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
            <label>Comprobante de factura</label>
            <input type="number" class="form-control" name="comprobante" placeholder="32423424322432" required>
        </div>
        @error('comprobante')
            <small>*{{$message}}</small>
            @enderror
        <div>
            <label>Fecha de emision de la factura</label>
            <div class="input-group date" name="fecha_emision" data-provide="datepicker">
                <input type="date" class="form-control" name="fecha_emision" required>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
            @error('fecha_emision')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div>
            <label>Nombre profesional</label>
            <input type="text" class="form-control" name="profesional" placeholder="Gerardo Rodriguez" required>
            @error('profesional')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div>
            <label>Importe facturado</label>
            <input type="number" class="form-control" name="importe" placeholder="1000" required>
            @error('importe')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <br>
        <td>
            <button type="submit" class="btn btn-dark">Finalizar solicitud de reintegro</button>
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
