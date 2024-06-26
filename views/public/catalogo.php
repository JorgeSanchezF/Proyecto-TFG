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
            <a class="enlace-menu" href="catalogo">Catálogo</a>
            <a class="enlace-menu" href="estadisticas">Estadísticas</a>
            <a class="enlace-menu" href="resenas">Reseñas</a>
            <a class="enlace-menu" href="perfil">Perfil</a>
        </nav>
        <a href=<?php echo $enlaceSesion ?> class=<?php echo $claseSesion ?>><?php echo $textoInicioSesion ?></a>
    </header>
    <main>
        <input type="text" id="buscador" placeholder="Buscar juego por nombre...">
        <div id="seccion">
            <?php foreach ($juegos as $juego): ?>
                <div class="card" data-nombre="<?php echo $juego[1] ?>">
                    <img class="imagen-juego" src="../assets/img/juegos/<?php echo $juego[6] ?>.jpg"
                        alt="<?php echo $juego[6] ?>">
                    <p class="card-titulo"><?php echo $juego[1] ?></p>
                    <p class="card-duracion"><?php echo $juego[3] ?> horas</p>
                    <p class="card-plataforma"><?php echo $juego[4] ?></p>
                    <p class="card-precio"><?php echo $juego[5] ?>€</p>
                    <a class="boton-añadir" href="anadir-juego?id=<?php echo $juego[0] ?>">Añadir</a>
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
<script>
    document.getElementById("buscador").addEventListener("input", function () {
        let input = this.value.trim().toLowerCase();
        let cards = document.querySelectorAll(".card");

        cards.forEach(function (card) {
            let nombreJuego = card.dataset.nombre.toLowerCase();
            if (nombreJuego.includes(input)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    });
</script>

</html>