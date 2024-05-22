<?php

/*
Comprobación para cambiar el texto de el enlace de inicio de sesión a el nombre de usuario
si la sesion esta iniciada
*/
$textoInicioSesion = '';
$enlaceSesion = '';
$claseSesion = '';

if (empty($_SESSION['usuario'])) {

    $textoInicioSesion = 'Inicia Sesión';
    $enlaceSesion = 'index/login';
    $claseSesion = 'sign-in';
} else {
    $textoInicioSesion = 'Cerrar Sesión';
    $enlaceSesion = 'index/logout';
    $claseSesion = 'sign-out';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Coleccionista Digital</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleccionista digital</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/general.css">
    <script src="https://kit.fontawesome.com/ff01793a80.js" crossorigin="anonymous"></script>
</head>


<body>
    <header>
        <div class="logo">
            <a class="logo" href=""><img class="logo" src="assets/img/logo.png" alt="Logo"></a>
        </div>
        <nav>
            <a class="enlace-menu" href="index/catalogo">Catálogo</a>
            <a class="enlace-menu" href="index/estadisticas">Estadísticas</a>
            <a class="enlace-menu" href="index/resenas">Reseñas</a>
            <a class="enlace-menu" href="index/perfil">Perfil</a>
        </nav>
        <a href=<?php echo $enlaceSesion ?> class=<?php echo $claseSesion ?>><?php echo $textoInicioSesion ?></a>
    </header>
    <main>
        <div id="presentacion">
            <img id="fondo-index" src="assets/img/fondo-index.png" alt="imagen-fondo-bienvenida">

            <p id="texto-superior">Coleccionista Digital es tu plataforma para organizar tu biblioteca, escribir reseñas
                y
                consultar la
                duración de tus videojuegos favoritos.</p>
            <p id="texto-inferior">Descubre nuevos juegos, encuentra tu próximo desafío y lleva
                tu colección al
                siguiente nivel.</p>
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
            <a href="/politica-privacidad">Política de Privacidad</a> |
            <a href="/terminos-servicio">Términos de Servicio</a> |
            <a href="/contacto">Contacto</a>
        </p>
        <p>Al crear una cuenta, estás aceptando nuestros <a href="/politica-privacidad">términos de servicio</a> y
            nuestra <a href="/politica-privacidad">política de privacidad</a>.</p>
    </footer>

</body>

</html>