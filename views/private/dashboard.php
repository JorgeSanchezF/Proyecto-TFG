<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
</head>

<body>
    <main>

        <h3>Bienvenido Administrador <?php echo $_SESSION['usuario']['apodo'] ?></h3>
        <div>
            <a href="catalogo-admin">Administrar catálogo</a>
            <a href="">Administrar usuarios</a>
            <a href="">Administrar reseñas</a>
        </div>
    </main>
</body>

</html>