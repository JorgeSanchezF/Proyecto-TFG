<?php
require_once 'Controller.php';
require_once 'models/Juego.php';
require_once 'models/Juego_has_etiqueta.php';

class CatalogoController implements Controller
{
    public static function index()
    {
        $juego = new Juego();
        $juegos = $juego->findAll()->fetchAll();

        include 'views/public/catalogo.php';
    }

    public static function catalogoAdmin()
    {
        $juego = new Juego();
        $juegos = $juego->findAll()->fetchAll();

        // var_dump($_SESSION['usuario'][4]);
        // exit;

        //si el rol de usuario que entra en esta funcion es igual a 1 entra en la seccion de admin si no de vuelve a el catalogo publico
        if ($_SESSION['usuario'][4] == 1) {

            include 'views/private/catalogo/index.php';
        } else {
            header('Location: catalogo');
        }

    }

    public static function juegoDetalles()
    {
        $id = $_GET['id'];

        $juego = new Juego();
        $etiqueta = new Juego_has_etiqueta();

        $juegos = $juego->findById($id)->fetch();
        $etiquetas = $etiqueta->findById($id)->fetchAll();

        include 'views/private/catalogo/detalles.php';
    }
    public static function create()
    {
        //hacer que al insertar juego se inserten las etiquetas

        include 'views/private/catalogo/create.php';
    }

    public static function save()
    {
        //hacer que al insertar juego se inserten las etiquetas
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