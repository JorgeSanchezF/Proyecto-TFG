<?php
/*
Comprobación para cambiar el texto de el enlace de inicio de sesión a el nombre de usuario
si la sesion esta iniciada
*/
$textoInicioSesion = '';
$enlaceSesion = '';
$claseSesion = '';
$contador = 0;

if (empty($_SESSION['usuario'])) {

    $textoInicioSesion = 'Inicia Sesión';
    $enlaceSesion = 'login';
    $claseSesion = 'sign-in';
} else {
    $textoInicioSesion = 'Cerrar Sesión';
    $enlaceSesion = 'logout';
    $claseSesion = 'sign-out';
}
// var_dump($arrayjuegos);
// exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escribe reseña</title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/resena.css">
    <script src="https://kit.fontawesome.com/ff01793a80.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="logo">
            <a class="logo" href="../"><img class="logo" src="../assets/img/logo.png" alt="Logo"></a>
        </div>
        <nav>
            <a class="enlace-menu" href="catalogo">Catálogo</a>
            <a class="enlace-menu" href="estadisticas">Estadísticas</a>
            <a class="enlace-menu" href="reseñas">Reseñas</a>
            <a class="enlace-menu" href="perfil">Perfil</a>
        </nav>
        <a href=<?php echo $enlaceSesion ?> class=<?php echo $claseSesion ?>><?php echo $textoInicioSesion ?></a>
    </header>
    <main>
        <?php foreach ($reseñas as $reseña):
            ?>
            <div class="card">
                <p class="card-nombre"><?php echo $arrayjuegos[$contador]['nombre'] ?></p>
                <p class="card-texto"><?php echo $reseña[1] ?></p>
                <p class="card-puntuacion">Puntuación: <?php echo $reseña[2] ?></p>
                <p class="card-duracion"> Tiempo jugado:<?php echo $reseña[3] ?></p>
                <a class="boton-editar" href="resena-edit?id=<?php echo $reseña[0] ?>">Editar</a>
                <a class="boton-eliminar" href="resena-delete?id=<?php echo $reseña[0] ?>">Borrar</a>
            </div>
            <?php $contador = $contador + 1; endforeach; ?>

    </main>
    <footer>
        <div class="redes">
            <a href="https://www.youtube.com/"> <i class="fa-brands fa-youtube fa-2xl" style="color: #ff0000;"></i></a>
            <a href="https://twitter.com/home"> <i class="fa-brands fa-twitter fa-2xl" style="color: #74C0FC;"></i></a>
        </div>
        <p>&copy; 2024 Coleccionista Digital. Todos los derechos reservados.</p>
        <p>Desarrollado por Coleccionista Digital</p>
        <p>
            <a href="/politica-privacidad">Política de Privacidad</a> |
            <a href="/terminos-servicio">Términos de Servicio</a> |
            <a href="/contacto">Contacto</a>
        </p>
        <p>Al crear una cuenta, estás aceptando nuestros <a href="/politica-privacidad">términos de servicio</a> y
            nuestra <a href="/politica-privacidad">política de privacidad</a>.</p>
    </footer>
</body>

</html>