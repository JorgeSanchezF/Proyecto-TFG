<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escribe reseña</title>
    <link rel="stylesheet" href="assets/css/general.css">
    <script src="https://kit.fontawesome.com/ff01793a80.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="logo">
            <a class="logo" href="../"><img class="logo" src="assets/img/logo.png" alt="Logo"></a>
        </div>
        <nav>
            <a class="enlace-menu" href="index/catalogo">Catálogo</a>
            <a class="enlace-menu" href="index/estadisticas">Estadísticas</a>
            <a class="enlace-menu" href="index/reseñas">Reseñas</a>
            <a class="enlace-menu" href="index/perfil">Perfil</a>
        </nav>
        <a href=<?php echo $enlaceSesion ?> class=<?php echo $claseSesion ?>><?php echo $textoInicioSesion ?></a>
    </header>
    <main>
        <?php foreach ($reseñas as $reseña): ?>
            <div class="card">
                <p class="card-nombre"><?php echo $juego[1] ?></p>
                <p class="card-texto"><?php echo $reseña[1] ?></p>
                <p class="card-puntuacion"><?php echo $reseña[2] ?></p>
                <p class="card-duracion"><?php echo $reseña[3] ?></p>
                <a class="boton-editar" href="editar-reseña?id=<?php echo $reseña[0] ?>">Editar</a>
                <a class="boton-eliminar" href="eliminar-reseña?id=<?php echo $reseña[0] ?>">Borrar</a>
            </div>
        <?php endforeach; ?>

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