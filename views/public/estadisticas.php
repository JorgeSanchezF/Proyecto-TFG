<?php

/*
Comprobación para cambiar el texto de el enlace de inicio de sesión a el nombre de usuario
si la sesion esta iniciada*/

$textoInicioSesion = '';
$enlaceSesion = '';
$claseSesion = '';

if (empty($_SESSION['usuario'])) {

    $textoInicioSesion = 'Inicia Sesión';
    $enlaceSesion = 'login';
    $claseSesion = 'sign-in';
} else {
    $textoInicioSesion = 'Cerrar Sesión';
    $enlaceSesion = 'logout';
    $claseSesion = 'sign-out';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
</head>

<body>
    <header>
        <div class="logo">
            <a class="logo" href="../"><img class="logo" src="assets/img/logo.png" alt="Logo"></a>
        </div>
        <nav>
            <a class="enlace-menu" href="catalogo">Catálogo</a>
            <a class="enlace-menu" href="estadisticas">Estadísticas</a>
            <a class="enlace-menu" href="perfil">Perfil</a>
        </nav>
        <a href=<?php echo $enlaceSesion ?> class=<?php echo $claseSesion ?>><?php echo $textoInicioSesion ?></a>
    </header>
    <main>
        <div>
            <div>
                <h3>Juegos en tu biblioteca</h3>
                <p>Tienes <?php echo $numeroJuegos ?> juegos</p>
            </div>
            <div>
                <h3>Horas totales</h3>
                <p>El total de horas de tu biblioteca es <?php echo $horasTotales ?> horas</p>
            </div>
            <div>
                <h3>Precio de tu biblioteca</h3>
                <p>Has gastado <?php echo $dineroTotal ?> €</p>
            </div>
        </div>
        <div>
            
            <?php foreach ($juegosArray as $juego): ?>
                <div class="card">
                    <img src="../assets/img/juegos/<?php echo $juego[6] ?>.jpg" alt="<?php echo $juego[6] ?>">
                    <p class="card-titulo"><?php echo $juego[1] ?></p>
                    <p class="card-duracion"><?php echo $juego[3] ?> horas</p>
                    <p class="card-plataforma"><?php echo $juego[4] ?></p>
                    <p class="card-precio"><?php echo $juego[5] ?>€</p>
                    <a class="boton-añadir" href="añadir-juego?id=<?php echo $juego[0] ?>">Añadir</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>