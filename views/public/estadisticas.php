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

$etiquetasArrayConv = [];
foreach ($etiquetasArray as $value) {
    switch ($value) {
        case 1:
            array_push($etiquetasArrayConv, "Disparos");
            break;
        case 2:
            array_push($etiquetasArrayConv, "Acción");
            break;
        case 3:
            array_push($etiquetasArrayConv, "Aventura");
            break;
        case 4:
            array_push($etiquetasArrayConv, "Rol");
            break;
        case 5:
            array_push($etiquetasArrayConv, "Estrategia");
            break;
        case 6:
            array_push($etiquetasArrayConv, "Terror");
            break;
        case 7:
            array_push($etiquetasArrayConv, "Primera persona");
            break;
        case 8:
            array_push($etiquetasArrayConv, "Tercera persona");
            break;
        case 9:
            array_push($etiquetasArrayConv, "Free to play");
            break;
        case 10:
            array_push($etiquetasArrayConv, "Arcade");
            break;
        case 11:
            array_push($etiquetasArrayConv, "Simulación");
            break;
        case 12:
            array_push($etiquetasArrayConv, "Casual");
            break;
        default:
            array_push($etiquetasArrayConv, "Deportes");
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/estadisticas.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        <div class="logo">
            <a class="logo" href="../"><img class="logo" src="../assets/img/logo.png" alt="Logo"></a>
        </div>
        <nav>
            <a class="enlace-menu" href="catalogo">Catálogo</a>
            <a class="enlace-menu" href="estadisticas">Estadísticas</a>
            <a class="enlace-menu" href="index/reseñas">Reseñas</a>
            <a class="enlace-menu" href="perfil">Perfil</a>
        </nav>
        <a href=<?php echo $enlaceSesion ?> class=<?php echo $claseSesion ?>><?php echo $textoInicioSesion ?></a>
    </header>
    <main>
        <div id="seccion1">
            <div class="card-estadisticas">
                <h3>Juegos en tu biblioteca</h3>
                <p>Tienes <?php echo $numeroJuegos ?> juegos</p>
            </div>
            <div class="card-estadisticas">
                <h3>Horas totales</h3>
                <p>El total de horas de tu biblioteca es <?php echo $horasTotales ?> horas</p>
            </div>
            <div class="card-estadisticas">
                <h3>Precio de tu biblioteca</h3>
                <p>El valor de tu biblioteca es de <?php echo $dineroTotal ?> €</p>
            </div>
            <div class="card-estadisticas">
                <h3>Generos más jugados</h3>
                <canvas id="doughnutChart" width="400" height="400"></canvas>
            </div>
        </div>

        <div id="seccion2">
            <h3>Tu biblioteca</h3>
            <input type="text" id="buscador" placeholder="Buscar por nombre...">
            <div id="subseccion2">
                <?php foreach ($juegosArray as $juego): ?>
                    <div class="card" data-nombre="<?php echo $juego[1] ?>">
                        <img src="../assets/img/juegos/<?php echo $juego[6] ?>.jpg" alt="<?php echo $juego[6] ?>">
                        <p class="card-titulo"><?php echo $juego[1] ?></p>
                        <p class="card-duracion"><?php echo $juego[3] ?> horas</p>
                        <p class="card-plataforma"><?php echo $juego[4] ?></p>
                        <p class="card-precio"><?php echo $juego[5] ?>€</p>
                        <a class="boton-reseña" href="resena-crear?id=<?php echo $juego[0] ?>">Reseñar</a>
                        <a class="boton-eliminar" href="eliminar-juego?id=<?php echo $juego[0] ?>">Eliminar</a>
                    </div>
                <?php endforeach; ?>
            </div>
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
<script>
    document.getElementById("buscador").addEventListener("input", function () {
        let input = this.value.toLowerCase();
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
<script>
    //https://www.w3schools.com/PHP/func_json_encode.asp
    let etiquetasArrayConv = <?php echo json_encode($etiquetasArrayConv); ?>;

    //https://www.w3schools.com/jsref/jsref_reduce.asp
    let etiquetasCount = etiquetasArrayConv.reduce(function (acc, val) {
        acc[val] = (acc[val] || 0) + 1;
        return acc;
    }, {});

    let etiquetasLabels = Object.keys(etiquetasCount);
    let etiquetasData = Object.values(etiquetasCount);

    let ctx = document.getElementById('doughnutChart').getContext('2d');
    let doughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: etiquetasLabels,
            datasets: [{
                label: 'Etiquetas',
                data: etiquetasData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false
        }
    });
</script>