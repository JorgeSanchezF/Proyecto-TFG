<?php

/*
Comprobación para cambiar el texto de el enlace de inicio de sesión a el nombre de usuario
si la sesion esta iniciada
*/
$textoInicioSesion = '';
$enlaceSesion = '';
$claseSesion = '';
if ($_SESSION["usuario"] != null) {
    $textoInicioSesion = 'Cerrar Sesión';
    $enlaceSesion = '/cerrar-sesion';
    $claseSesion = 'sign-out';
} else {
    $textoInicioSesion = 'Inicia Sesión';
    $enlaceSesion = '/login';
    $claseSesion = 'sign-in';
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

</head>


<body>
    <header>
        <div class="logo">
            <a class="logo" href="/"><img class="logo" src="assets/img/logo.png" alt="Logo"></a>
        </div>
        <nav>
            <a class="enlace-menu" href="/catalogo/index">Catálogo</a>
            <a class="enlace-menu" href="/estadisticas/index">Estadísticas</a>
            <a class="enlace-menu" href="/perfil/index">Perfil</a>
        </nav>
        <a href=<?php echo $enlaceSesion ?> class=<?php echo $claseSesion ?>><?php echo $textoInicioSesion ?></a>
    </header>
    <main>
        <div id="presentacion">
            <img id="fondo-index" src="assets/img/fondo-index.jpg" alt="imagen-fondo-bienvenida">
            <div class="texto-presentacion">

                <p id="texto-superior">Coleccionista Digital es tu plataforma para organizar tu backlog, leer reseñas y
                    consultar la
                    duración de tus videojuegos favoritos.</p>
                <p id="texto-inferior">Descubre nuevos juegos, encuentra tu próximo desafío y lleva
                    tu colección al
                    siguiente nivel.</p>

            </div>
            <div></div>
    </main>
    <footer></footer>
</body>

</html>