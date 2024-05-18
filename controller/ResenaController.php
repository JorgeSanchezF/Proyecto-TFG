<?php
require_once 'Controller.php';
require_once 'models/Resena.php';
require_once 'models/Juego.php';
class ResenaController implements Controller
{
    public static function index()
    {
        if (isset($_SESSION['usuario'])) {
            $reseña = new Resena();
            $juego = new Juego();
            $arrayjuegos = [];
            $reseñas = $reseña->findByUsuarioId($_SESSION['usuario']['id'])->fetchAll();

            foreach ($reseñas as $key => $value) {

                $juegos = $juego->findById($value['juego_id'])->fetch();
                array_push($arrayjuegos, $juegos);
            }

            if ($reseñas == null) {
                header('Location: estadisticas');
            } else {

                include 'views/public/resena/resena.php';
            }
        } else {
            header('Location: catalogo');
        }


    }

    public static function create()
    {
        include 'views/public/resena/create.php';
    }

    public static function save()
    {
        $texto = $_POST['texto'];
        $puntuacion = $_POST['puntuacion'];
        $duracion = $_POST['duracion'];
        $juego_id = $_POST['juego_id'];
        $usuario_id = $_POST['usuario_id'];
        $datos = [
            $texto,
            $puntuacion,
            $duracion,
            $usuario_id,
            $juego_id
        ];

        $resena = new Resena();
        $resena->store($datos);
        header('Location: estadisticas');
    }

    public static function edit($id)
    {
        $id = $_GET['id'];
        $resena = new Resena();
        $resenas = $resena->findById($id)->fetch();
        include 'views/public/resena/edit.php';
    }

    public static function update()
    {
        $resena = new Resena;
        $id = $_POST['id'];
        $texto = $_POST['texto'];
        $puntuacion = $_POST['puntuacion'];
        $duracion = $_POST['duracion'];
        $usuario_id = $_POST['usuario_id'];
        $juego_id = $_POST['juego_id'];
        $datos = [$texto, $puntuacion, $duracion, $usuario_id, $juego_id];
        $resena->updateById($id, $datos);
        header('Location: resenas');
    }

    public static function destroy()
    {
        $id = $_GET['id'];
        $resena = new Resena();
        $resena->destroyById($id);
        header('Location: resenas');
    }
}