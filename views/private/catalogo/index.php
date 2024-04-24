<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla catálogo</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="container mt-5">
        <div class="mb-3">
            <a href="dashboard" class="btn btn-primary">Volver a menú de administración</a>
            <a href="catalogo-create" class="btn btn-success">Añadir a catálogo</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Duración estimada</th>
                    <th>Plataforma</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($juegos as $juego): ?>
                    <tr>
                        <td><?php echo $juego[1] ?></td>
                        <td><?php echo $juego[3] ?> h</td>
                        <td><?php echo $juego[4] ?></td>
                        <td><?php echo $juego[5] ?>€</td>
                        <td>
                            <a href="juego?id=<?php echo $juego[0] ?>" class="btn btn-info btn-sm">Detalles</a>
                            <a href="juego-delete?id=<?php echo $juego[0] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>


</body>

</html>