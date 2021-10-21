<!DOCTYPE html>
@extends('layouts.main')
@section('contenedor')
    <html>
    <h2>Generar cupon de pago</h2>
    <form action="{{route('cupon.store')}}" method="POST">
    @csrf
    <div>
        <div class="form-group">
            <label>Seleccionar forma de pago</label>
            <select class="form-control" name="formaDePago">
                @foreach(array_keys($formas) as $id)
                    <option value="{{$id}}">{{$formas[$id]}}</option>
                @endforeach
            </select>
            @error('formaDePago')
            <small>*{{$message}}</small>
            @enderror
        </div>
    </div>
    <td>
        <button type="submit" class="btn btn-dark">Generar cupon</button>
    </td>
    </form>

    </html>
@endsection
