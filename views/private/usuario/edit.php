<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="container mt-5">
        <h2>Formulario de Usuario</h2>

        <form action="usuario-update">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" placeholder="<?php echo $usuario[0] ?>">
            </div>
            <div class="form-group">
                <label for="apodo">Apodo:</label>
                <input type="text" class="form-control" id="apodo" name="apodo"
                    placeholder="<?php echo $usuario['apodo'] ?>">
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo"
                    placeholder="<?php echo $usuario['correo'] ?>">
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
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