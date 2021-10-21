<table>
    <p>Total: ${{ $total  }}</p>
    @foreach(array_keys($costos) as $cliente)
        <p>Costo de {{ $cliente }}: ${{ $costos[$cliente] }}</p>
    @endforeach
    <p>Codigo de pago {{ $codigo }}</p>
    <h1>Cupon de pago</h1>
</table>
