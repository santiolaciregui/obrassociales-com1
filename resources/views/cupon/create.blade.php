<!DOCTYPE html>
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
@extends('layouts.main')
@section('contenedor')
    <html>
    <h2>Generar cupon de pago</h2>
    <form action="{{route('cupon.store')}}" method="POST">
    @csrf
    <div>
        <div class="form-group">
            <label>Seleccionar forma de pago</label>
            <select class="form-control" name="formaDePago" required>
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
    <td>
        <a href="welcome" class="btn btn-secondary">Regresar</a>
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

