<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Tareas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="auth-body">
    <div class="auth-wrapper">
        <section class="auth-brand">
            <div class="brand-icon">✓</div>
            <h1>Mis Tareas</h1>
            <p>Organiza tu día, logra más.</p>

            <div class="brand-illustration">📋</div>

            <ul>
                <li>✓ Organiza tus tareas fácilmente</li>
                <li>✓ Ahorra tiempo y sé más productivo</li>
                <li>✓ Tu información siempre segura</li>
            </ul>
        </section>

        <section class="auth-form">
            {{ $slot }}
        </section>
    </div>
</body>
</html>