<h1>Lista de Jogadores</h1>

@foreach($jogadores as $jogador)
    <p>{{ $jogador->nome }}</p>
@endforeach
