<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <main class="container mt-5">
        <a href="../">Volver</a>
        <br>
        <a href="register" class="btn btn-primary">¿No tienes cuenta?</a>
        <form method="POST" class="formulario-inicio" action="doLogin">
            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
        </form>
    </main>
</body>

</html>