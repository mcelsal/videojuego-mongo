<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <h1>Formulario de Login</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <label>Usuario:</label>
            <input type="text" name="usuario" required>
        </div>

        <br>

        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <br>

        <button type="submit">Iniciar sesión</button>
    </form>

</body>
</html>
