<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="container mt-5">

        <div class="mb-3">
            <a href="dashboard" class="btn btn-primary">Volver a menú de administración</a>
        </div>

        <div class="mb-3">
            <input type="text" id="buscador" class="form-control" placeholder="Buscar por apodo o correo">
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th><a href="#" onclick="sortTable(0)">Apodo</a></th>
                    <th><a href="#" onclick="sortTable(1)">Correo</a></th>
                    <th><a href="#" onclick="sortTable(2)">Rol</a></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['apodo'] ?></td>
                        <td><?php echo $usuario['correo'] ?></td>
                        <td><?php if ($usuario['rol_id'] == 1) {
                            echo 'Administrador';
                        } else {
                            echo 'Usuario';
                        }
                        ?></td>
                        <td>
                            <a href="usuario-edit?id=<?php echo $usuario[0] ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="usuario-delete?id=<?php echo $usuario[0] ?>" class=" btn btn-danger
                                btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>

    <!-- Bootstrap JS y jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#buscador").on("keyup", function () {
                let value = $(this).val().toLowerCase();
                $("table tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        function sortTable(columnIndex) {
            let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.querySelector("table");
            switching = true;
            dir = "asc";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("TD")[columnIndex];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
</body>

</html>