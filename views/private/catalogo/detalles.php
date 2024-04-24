<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="container mt-5">
        <a href="catalogo-admin" class="btn btn-primary mb-3">Volver a tabla</a>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><?php echo $juegos[1] ?></h3>
                <p class="card-text"><?php echo $juegos[2] ?></p>
                <p class="card-text"><?php echo $juegos[4] ?></p>
                <p class="card-text"><?php echo $juegos[5] ?> €</p>
            </div>
            <div class="card-footer bg-light">
                <?php foreach ($etiquetas as $etiqueta): ?>
                    <?php
                    switch ($etiqueta[2]) {
                        case 1:
                            echo "<span class='badge badge-primary'>Acción</span> ";
                            break;
                        case 2:
                            echo "<span class='badge badge-primary'>Aventura</span> ";
                            break;
                        case 3:
                            echo "<span class='badge badge-primary'>Rol</span> ";
                            break;
                        case 4:
                            echo "<span class='badge badge-primary'>Estrategia</span> ";
                            break;
                        case 5:
                            echo "<span class='badge badge-primary'>Terror</span> ";
                            break;
                        case 6:
                            echo "<span class='badge badge-primary'>Primera persona</span> ";
                            break;
                        case 7:
                            echo "<span class='badge badge-primary'>Tercera persona</span> ";
                            break;
                        case 8:
                            echo "<span class='badge badge-primary'>Free to play</span> ";
                            break;
                        case 9:
                            echo "<span class='badge badge-primary'>Arcade</span> ";
                            break;
                        case 10:
                            echo "<span class='badge badge-primary'>Simulación</span> ";
                            break;
                        case 11:
                            echo "<span class='badge badge-primary'>Casual</span> ";
                            break;
                        case 12:
                            echo "<span class='badge badge-primary'>Deportes</span> ";
                            break;
                        default:
                            echo "<span class='badge badge-primary'>Disparos</span> ";
                            break;
                    }
                    ?>
                <?php endforeach ?>
            </div>
        </div>
    </main>

    
</body>

</html>
