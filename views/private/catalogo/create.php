<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Videojuego</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <script>
        function validarFormulario() {
            let nombre = document.getElementById('nombre').value;
            let descripcion = document.getElementById('descripcion').value;
            let precio = document.getElementById('precio').value;
            let duracion = document.getElementById('duracion').value;
            let etiquetas = document.querySelectorAll('input[name="etiquetas[]"]:checked').length;
            let plataformas = document.querySelectorAll('input[name="plataformas[]"]:checked').length;

            if (nombre === '' || descripcion === '' || precio === '' || duracion === '' || (etiquetas === 0 && plataformas === 0)) {
                alert('Por favor, completa todos los campos y selecciona al menos una etiqueta o plataforma.');
                return false;
            }

            return true;
        }

        $(document).ready(function () {
            $("button[type='submit']").prop("disabled", true);
        });

        $('input[name="etiquetas[]"], input[name="plataformas[]"]').change(function () {
            let nombre = $('#nombre').val();
            let descripcion = $('#descripcion').val();
            let precio = $('#precio').val();
            let duracion = $('#duracion').val();
            let etiquetas = $('input[name="etiquetas[]"]:checked').length;
            let plataformas = $('input[name="plataformas[]"]:checked').length;

            if (nombre !== '' && descripcion !== '' && precio !== '' && duracion !== '' && (etiquetas > 0 || plataformas > 0)) {
                $("button[type='submit']").prop("disabled", false);
            } else {
                $("button[type='submit']").prop("disabled", true);
            }
        });
    </script>

    <main class="container mt-5">
        <a href="catalogo-admin" class="btn btn-primary">Volver</a>

        <h2>Insertar Videojuego</h2>
        <form id="videojuegoForm" action="catalogo-save" method="POST">

            <div class="form-group">
                <label for="nombre">Nombre del Videojuego:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>


            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>


            <div class="form-group">
                <label for="precio">Precio (€):</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>


            <div class="form-group">
                <label for="duracion">Horas de duración:</label>
                <input type="number" class="form-control" id="duracion" name="duracion" step="0.1" required>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Plataformas:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="plataformaPC" name="plataformas[]"
                            value="PC">
                        <label class="form-check-label" for="plataformaPC">PC</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="plataformaPS4" name="plataformas[]"
                            value="PlayStation 4">
                        <label class="form-check-label" for="plataformaPS4">PlayStation 4</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="plataformaPS5" name="plataformas[]"
                            value="PlayStation 5">
                        <label class="form-check-label" for="plataformaPS5">PlayStation 5</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="plataformaXboxOne" name="plataformas[]"
                            value="Xbox One">
                        <label class="form-check-label" for="plataformaXboxOne">Xbox One</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="plataformaXboxSeries" name="plataformas[]"
                            value="Xbox Series X/S">
                        <label class="form-check-label" for="plataformaXboxSeries">Xbox Series X/S</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="plataformaSwitch" name="plataformas[]"
                            value="Nintendo Switch">
                        <label class="form-check-label" for="plataformaSwitch">Nintendo Switch</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="plataformaiOS" name="plataformas[]"
                            value="iOS">
                        <label class="form-check-label" for="plataformaiOS">iOS</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="plataformaAndroid" name="plataformas[]"
                            value="Android">
                        <label class="form-check-label" for="plataformaAndroid">Android</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="plataformaOtra" name="plataformas[]"
                            value="Otra">
                        <label class="form-check-label" for="plataformaOtra">Otra</label>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label>Etiquetas:</label>
                <div>
                    <div>
                        <input type="checkbox" id="disparos" name="etiquetas[]" value="1">
                        <label for="disparos">Disparos</label>
                    </div>
                    <div>
                        <input type="checkbox" id="accion" name="etiquetas[]" value="2">
                        <label for="accion">Acción</label>
                    </div>
                    <div>
                        <input type="checkbox" id="aventura" name="etiquetas[]" value="3">
                        <label for="aventura">Aventura</label>
                    </div>
                    <div>
                        <input type="checkbox" id="rol" name="etiquetas[]" value="4">
                        <label for="rol">Rol</label>
                    </div>
                    <div>
                        <input type="checkbox" id="estrategia" name="etiquetas[]" value="5">
                        <label for="estrategia">Estrategia</label>
                    </div>
                    <div>
                        <input type="checkbox" id="terror" name="etiquetas[]" value="6">
                        <label for="terror">Terror</label>
                    </div>
                    <div>
                        <input type="checkbox" id="primera_persona" name="etiquetas[]" value="7">
                        <label for="primera_persona">Primera persona</label>
                    </div>
                    <div>
                        <input type="checkbox" id="tercera_persona" name="etiquetas[]" value="8">
                        <label for="tercera_persona">Tercera persona</label>
                    </div>
                    <div>
                        <input type="checkbox" id="free_to_play" name="etiquetas[]" value="9">
                        <label for="free_to_play">Free to play</label>
                    </div>
                    <div>
                        <input type="checkbox" id="arcade" name="etiquetas[]" value="10">
                        <label for="arcade">Arcade</label>
                    </div>
                    <div>
                        <input type="checkbox" id="simulacion" name="etiquetas[]" value="11">
                        <label for="simulacion">Simulación</label>
                    </div>
                    <div>
                        <input type="checkbox" id="casual" name="etiquetas[]" value="12">
                        <label for="casual">Casual</label>
                    </div>
                    <div>
                        <input type="checkbox" id="deportes" name="etiquetas[]" value="13">
                        <label for="deportes">Deportes</label>
                    </div>

                </div>

            </div>


            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </main>




</body>

</html>