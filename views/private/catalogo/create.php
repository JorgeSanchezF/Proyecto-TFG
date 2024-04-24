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

            if (nombre === '' || descripcion === '' || precio === '' || duracion === '' || etiquetas === 0) {
                alert('Por favor, completa todos los campos y selecciona al menos una etiqueta.');
                return false;
            }

            return true;
        }

        $(document).ready(function () {
            $("button[type='submit']").prop("disabled", true);
        });

        $('input[name="etiquetas[]"]').change(function () {
            if ($('input[name="etiquetas[]"]:checked').length > 0) {
                $("button[type='submit']").prop("disabled", false);
            } else {
                $("button[type='submit']").prop("disabled", true);
            }
        });
    </script>
    <main class="container mt-5">
        <a href="catalogo-admin" class="btn btn-secondary">Volver</a>

        <h2>Insertar Videojuego</h2>
        <form id="videojuegoForm" action="procesar_formulario.php" method="POST">

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
                <label>Etiquetas:</label>
                <div>
                    <input type="checkbox" id="disparos" name="etiquetas[]" value="Disparos" required>
                    <label for="disparos">Disparos</label>
                </div>
                <div>
                    <input type="checkbox" id="accion" name="etiquetas[]" value="Acción" required>
                    <label for="accion">Acción</label>
                </div>
                <div>
                    <input type="checkbox" id="aventura" name="etiquetas[]" value="Aventura" required>
                    <label for="aventura">Aventura</label>
                </div>
                <div>
                    <input type="checkbox" id="rol" name="etiquetas[]" value="Rol" required>
                    <label for="rol">Rol</label>
                </div>
                <div>
                    <input type="checkbox" id="estrategia" name="etiquetas[]" value="Estrategia" required>
                    <label for="estrategia">Estrategia</label>
                </div>
                <div>
                    <input type="checkbox" id="terror" name="etiquetas[]" value="Terror" required>
                    <label for="terror">Terror</label>
                </div>
                <div>
                    <input type="checkbox" id="primera_persona" name="etiquetas[]" value="Primera persona" required>
                    <label for="primera_persona">Primera persona</label>
                </div>
                <div>
                    <input type="checkbox" id="tercera_persona" name="etiquetas[]" value="Tercera persona" required>
                    <label for="tercera_persona">Tercera persona</label>
                </div>
                <div>
                    <input type="checkbox" id="free_to_play" name="etiquetas[]" value="Free to play" required>
                    <label for="free_to_play">Free to play</label>
                </div>
                <div>
                    <input type="checkbox" id="arcade" name="etiquetas[]" value="Arcade" required>
                    <label for="arcade">Arcade</label>
                </div>
                <div>
                    <input type="checkbox" id="simulacion" name="etiquetas[]" value="Simulación" required>
                    <label for="simulacion">Simulación</label>
                </div>
                <div>
                    <input type="checkbox" id="casual" name="etiquetas[]" value="Casual" required>
                    <label for="casual">Casual</label>
                </div>
                <div>
                    <input type="checkbox" id="deportes" name="etiquetas[]" value="Deportes" required>
                    <label for="deportes">Deportes</label>
                </div>
            </div>

            </div>


            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </main>




</body>

</html>