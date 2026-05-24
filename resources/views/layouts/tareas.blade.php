<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Tareas')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="tareas-body">

    <nav class="topbar">
        <div class="logo">✅ Mis Tareas</div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-secondary" type="submit">
                Cerrar sesión
            </button>
        </form>
    </nav>

    <main class="container">
        @yield('content')
    </main>

</body>
</html>