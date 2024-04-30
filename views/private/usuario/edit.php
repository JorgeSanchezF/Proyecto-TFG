<?php
if ($usuarios[4] == 1) {
    $rol = "Administrador";
} else {
    $rol = "Usuario";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validarFormulario() {
            var apodo = document.getElementById('apodo').value;
            var correo = document.getElementById('correo').value;
            var rol = document.getElementById('rol').value;

            // Validación de apodo (debe haber texto)
            if (apodo.trim() == '') {
                alert('Por favor, ingresa un apodo.');
                return false;
            }

            // Validación de correo (debe contener '@' y '.com')
            if (!correo.includes('@') || !correo.includes('.com')) {
                alert('Por favor, ingresa un correo válido.');
                return false;
            }

            // Validación de rol (debe seleccionarse una opción)
            if (rol == '') {
                alert('Por favor, selecciona un rol.');
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <main class="container mt-5">
        <a href="usuario-admin" class="btn btn-secondary">Atras</a>
        <h2>Formulario de Usuario</h2>

        <form action="usuario-update" onsubmit="return validarFormulario()">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" placeholder="<?php echo $usuarios[0] ?>">
            </div>
            <div class="form-group">
                <label for="apodo">Apodo:</label>
                <input type="text" class="form-control" id="apodo" name="apodo"
                    placeholder="<?php echo $usuarios[2] ?>">
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo"
                    placeholder="<?php echo $usuarios[1] ?>">
            </div>
            <div class="form-group">
                <label for="rol">Rol actual: <?php echo $rol ?></label>

                <select class="form-control" id="rol" name="rol">
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </main>
</body>

</html>