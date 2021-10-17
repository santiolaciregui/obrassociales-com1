<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
    <html>
    <h2>Solicitar aprobación de reintegro</h2>
    <form action="{{route('reintegro.store')}}" method="POST">
        @csrf
        <div>
            <label>DNI</label>
            <input type="number" class="form-control" name="dni" placeholder="{{ $client->dni }}" disabled>
            @error('dni')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div>
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="{{ $client->nombre }}" disabled>
            @error('nombre')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div>
            <label>Apellido</label>
            <input type="text" class="form-control" name="apellido" placeholder="{{ $client->apellido }}" disabled>
            @error('apellido')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div>
            <label>Numero de afiliado</label>
            <input type="number" class="form-control" name="numero_afiliado" placeholder="{{ $client->id }}" disabled>
            @error('numero_afiliado')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Plan</label>
            <select class="form-control" name="plan" disabled>
                <option value="{{$client->plan_id}}" selected>{{ $plan->nombre }}</option>
            </select>
            @error('plan')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div>
            <label>Fecha de envio de solicitud</label>
            <div class="input-group date" name="fecha_solicitud" data-provide="datepicker">
                <input type="date" class="form-control" value="{{ $today }}" name="fecha_solicitud" disabled>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
            @error('fecha_solicitud')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div>
            <label>Comprobante de factura</label>
            <input type="number" class="form-control" name="comprobante" placeholder="32423424322432">
            @error('comprobante')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div>
            <label>Fecha de emision de la factura</label>
            <div class="input-group date" name="fecha_emision" data-provide="datepicker">
                <input type="date" class="form-control" name="fecha_emision">
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
            <input type="text" class="form-control" name="profesional" placeholder="Gerardo Rodriguez">
            @error('profesional')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div>
            <label>Importe facturado</label>
            <input type="number" class="form-control" name="importe" placeholder="1000">
            @error('importe')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <br>
        <td>
            <button type="submit" class="btn btn-dark">Finalizar solicitud de reintegro</button>
        </td>
    </form>

    </html>
@endsection
