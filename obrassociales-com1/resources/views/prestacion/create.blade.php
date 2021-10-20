<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
    <html>
    <h2>Solicitar aprobación de prestación</h2>
    <form action="{{route('prestacion.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>DNI</label>
            <input type="number" class="form-control" name="dni" placeholder="{{ $client->dni }}" disabled>
            @error('dni')
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
            <label>Autorización</label>
            <input type="file" class="form-control" name="autorizacion">
            @error('autorización')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <br>
        <td>
            <button type="submit" class="btn btn-dark">Finalizar solicitud de prestación</button>
        </td>
    </form>

    </html>
@endsection
