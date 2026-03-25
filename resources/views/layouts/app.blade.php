<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Chapecoense</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Associação_Chapecoense_de_Futebol.svg.png') }}">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <nav class="bg-green-800 text-white shadow-lg">
        <div class="container mx-auto px-6 py-3 flex items-center justify-between">

            <a href="/" class="flex items-center gap-3 hover:opacity-90 transition">
                <img src="{{ asset('images/Logo_Associação_Chapecoense_de_Futebol.svg.png') }}"
                     alt="Escudo Chapecoense" class="h-10 w-10 object-contain">
                <span class="text-xl font-bold tracking-wide">Sistema Chapecoense</span>
            </a>

            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="/" class="hover:text-green-300 transition {{ request()->is('/') ? 'text-green-300 border-b-2 border-green-300 pb-1' : '' }}">
                    Home
                </a>
                <a href="/socios" class="hover:text-green-300 transition {{ request()->is('socios*') ? 'text-green-300 border-b-2 border-green-300 pb-1' : '' }}">
                    Sócios
                </a>
                <a href="/jogadores" class="hover:text-green-300 transition {{ request()->is('jogadores*') ? 'text-green-300 border-b-2 border-green-300 pb-1' : '' }}">
                    Jogadores
                </a>
                <a href="/partidas" class="hover:text-green-300 transition {{ request()->is('partidas*') ? 'text-green-300 border-b-2 border-green-300 pb-1' : '' }}">
                    Partidas
                </a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8 flex-1">
        @yield('content')
    </main>

    <footer class="bg-green-800 text-green-300 text-center text-xs py-4 mt-auto">
        © {{ date('Y') }} Associação Chapecoense de Futebol — Sistema de Gerenciamento
    </footer>

</body>
</html>