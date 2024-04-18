<?php

/*
Comprobación para cambiar el texto de el enlace de inicio de sesión a el nombre de usuario
si la sesion esta iniciada
*/
// var_dump($_SESSION);
// exit;

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
    <title>Catálogo</title>

    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/catalogo.css">
    <script src="https://kit.fontawesome.com/ff01793a80.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="logo">
            <a class="logo" href="../"><img class="logo" src="../assets/img/logo.png" alt="Logo"></a>
        </div>
        <nav>
            <a class="enlace-menu" href="index/catalogo">Catálogo</a>
            <a class="enlace-menu" href="index/estadisticas">Estadísticas</a>
            <a class="enlace-menu" href="index/perfil">Perfil</a>
        </nav>
        <a href=<?php echo $enlaceSesion ?> class=<?php echo $claseSesion ?>><?php echo $textoInicioSesion ?></a>
    </header>
    <main>
        <div class="row">
            <?php foreach ($juegos as $juego): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="" class="card-img-top" alt="img-<?php echo $juego['nombre']; ?>">

                        <div class="card-body">

                            <h5 class="card-title"><?php echo $juego['nombre']; ?></h5>


                            <p class="card-text"><strong>Precio:</strong> $<?php echo $juego['precio']; ?></p>


                            <p class="card-text"><strong>Descripción:</strong> <?php echo $juego['descripcion']; ?></p>


                            <p class="card-text"><strong>Duración:</strong> <?php echo $juego['duracion']; ?> horas</p>


                            <p class="card-text" id="plataforma"><strong>Plataforma:</strong>
                                <?php echo $juego['plataforma']; ?></p>

                            <a id="añadir-biblioteca" href="">Añadir a biblioteca</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </main>
    <footer>
        <div class="redes">
            <a href="https://www.youtube.com/"> <i class="fa-brands fa-youtube fa-2xl" style="color: #ff0000;"></i></a>
            <a href="https://twitter.com/home"> <i class="fa-brands fa-twitter fa-2xl" style="color: #74C0FC;"></i></a>
        </div>
        <p>&copy; 2024 Coleccionista Digital. Todos los derechos reservados.</p>
        <p>Desarrollado por Coleccionista Digital</p>
        <p>
            <a href="politica-privacidad">Política de Privacidad</a> |
            <a href="terminos-servicio">Términos de Servicio</a> |
            <a href="contacto">Contacto</a>
        </p>
        <p>Al crear una cuenta, estás aceptando nuestros <a href="politica-privacidad">términos de servicio</a> y
            nuestra <a href="politica-privacidad">política de privacidad</a>.</p>
    </footer>
</body>

</html>