<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="container mt-5">
        <a href="catalogo" class="btn btn-primary">Atras</a>
        <h3 class="mb-4">Bienvenido Administrador <?php echo ucfirst($_SESSION['usuario']['apodo']) ?></h3>
        <div class="list-group">
            <a href="catalogo-admin" class="list-group-item list-group-item-action">Administrar catálogo</a>
            <a href="usuario-admin" class="list-group-item list-group-item-action">Administrar usuarios</a>
        </div>
    </main>
</body>

</html>