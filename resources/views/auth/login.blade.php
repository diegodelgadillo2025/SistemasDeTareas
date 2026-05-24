<x-guest-layout>
    <h1>Iniciar sesión</h1>
    <p class="auth-subtitle">Bienvenido de nuevo. Ingresa tus credenciales para continuar.</p>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label>Correo electrónico</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <label class="remember">
            <input type="checkbox" name="remember">
            Recordarme
        </label>

        <button type="submit">Iniciar sesión</button>

        <p class="auth-link">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}">Regístrate aquí</a>
        </p>
    </form>
</x-guest-layout>