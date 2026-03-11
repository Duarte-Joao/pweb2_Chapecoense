<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema Chapecoense</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <nav class="bg-green-700 text-white p-4">
        <div class="container mx-auto flex gap-6">
            <a href="/">Home</a>
            <a href="/socios">Sócios</a>
            <a href="/jogadores">Jogadores</a>
            <a href="/partidas">Partidas</a>
        </div>
    </nav>

    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

</body>
</html>