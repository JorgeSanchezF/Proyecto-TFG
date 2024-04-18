<?php
require_once 'Controller.php';
require_once 'models/Juego.php';
class CatalogoController implements Controller
{
    public static function index()
    {
        $juego = new Juego();
        $juegos = $juego->findAll()->fetchAll();

        include 'views/public/catalogo.php';
    }
    public static function create()
    {

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