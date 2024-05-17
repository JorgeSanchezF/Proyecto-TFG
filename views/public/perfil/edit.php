<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Edición de usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <main>
        <div class="container">
            <br>
            <a class="btn btn-secondary" href="perfil">Volver</a>
            <h2 class="mt-5">Formulario de Edición de usuario</h2>
            <form id="usuario-update-form" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="apodo">Apodo:</label>
                    <input type="text" class="form-control" id="apodo" name="apodo" required
                        value="<?php echo $usuarios['apodo'] ?>">
                    <div class="invalid-feedback">Por favor, introduce tu apodo.</div>
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="correo" name="correo" required
                        value=" <?php echo $usuarios['correo'] ?>">
                    <div class="invalid-feedback">Por favor, introduce un correo electrónico válido.</div>
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    <div class="invalid-feedback">Por favor, introduce una contraseña.</div>
                </div>
                <button type="submit" class="btn btn-primary">Modificar datos</button>
            </form>
        </div>

    </main>
</body>

<script>
    document.getElementById('usuario-update-form').addEventListener('submit', function (event) {

        let apodo = document.getElementById('apodo').value;
        let correo = document.getElementById('correo').value;


        let apodoValido = apodo.trim() !== '';
        let correoValido = correo.includes('@') && correo.endsWith('.com');


        if (!apodoValido) {
            document.getElementById('apodo').classList.add('is-invalid');
        } else {
            document.getElementById('apodo').classList.remove('is-invalid');
        }

        if (!correoValido) {
            document.getElementById('correo').classList.add('is-invalid');
        } else {
            document.getElementById('correo').classList.remove('is-invalid');
        }


        if (!apodoValido || !correoValido) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
</script>

</html>