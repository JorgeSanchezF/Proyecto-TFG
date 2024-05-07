<?php
require_once 'Controller.php';
require_once 'models/Resena.php';

class ResenaController implements Controller
{
    public static function index()
    {
        $reseña = new Resena();
        $reseñas = $reseña->findByUsuarioId($_SESSION['usuario']['id'])->fetchAll();

        if ($reseñas == null) {
            header('Location: estadisticas');
        } else {

            include 'views/public/resena/resena.php';
        }
    }

    public static function create()
    {
        include 'views/public/resena/create.php';
    }

    public static function save()
    {

    }

    public static function edit($id)
    {

    }

    public static function update()
    {

    }

    public static function destroy()
    {

    }
}