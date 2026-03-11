<h1>Lista de Partidas</h1>

@foreach($partidas as $partida)
    <p>{{ $partida->adversario }}</p>
@endforeach
