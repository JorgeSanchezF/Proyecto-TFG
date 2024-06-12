<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita tu reseña</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <a class="btn btn-secondary" href="resenas">Volver</a>
        <h2>Edita tu reseña</h2>
        <form action="resena-update" method="POST" id="puntuacion-form" class="needs-validation" novalidate>
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $resenas[0] ?>">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="juego_id" name="juego_id"
                    value="<?php echo $resenas['juego_id'] ?>">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="usuario_id" name="usuario_id"
                    value="<?php echo $_SESSION['usuario']['id'] ?>">
            </div>
            <div class="form-group">
                <label for="puntuacion">Puntuación (1-5):</label>
                <input type="number" class="form-control" id="puntuacion" name="puntuacion" min="1" max="5" step="0.1"
                    value="<?php echo $resenas['puntuacion'] ?>" required>
                <div class="invalid-feedback">Por favor, introduce una puntuación entre 1 y 5.</div>
            </div>
            <div class="form-group">
                <label for="texto">Texto (máximo 999 caracteres):</label>
                <input type="text" class="form-control" id="texto" name="texto" maxlength="999" rows="4"
                    value="<?php echo $resenas['texto'] ?>" required></input>
                <div class="invalid-feedback">Por favor, introduce un texto con un máximo de 999 caracteres.</div>
            </div>
            <div class="form-group">
                <label for="duracion">Duración (en horas):</label>
                <input type="number" class="form-control" id="duracion" name="duracion" min="1" max="9999" step="1"
                    value="<?php echo $resenas['duracion'] ?>" required>
                <div class="invalid-feedback">Por favor, introduce la duración en horas (número entero), mayor de 1 y
                    menor de 9999.</div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script>
        document.getElementById('puntuacion-form').addEventListener('submit', function (event) {
            let puntuacion = document.getElementById('puntuacion');
            let texto = document.getElementById('texto');
            let duracion = document.getElementById('duracion');

            let puntuacionValida = puntuacion.value >= 1 && puntuacion.value <= 5;
            let textoValido = texto.value.trim().length <= 999 && texto.value.trim().length >= 1;
            let duracionValida = duracion.value >= 1 && duracion.value <= 9999;

            if (!puntuacionValida) {
                puntuacion.classList.add('is-invalid');
            } else {
                puntuacion.classList.remove('is-invalid');
            }

            if (!textoValido) {
                texto.classList.add('is-invalid');
            } else {
                texto.classList.remove('is-invalid');
            }

            if (!duracionValida) {
                duracion.classList.add('is-invalid');
            } else {
                duracion.classList.remove('is-invalid');
            }

            if (!puntuacionValida || !textoValido || !duracionValida) {
                event.preventDefault();
                event.stopPropagation();
            }
        });
    </script>
</body>

</html>