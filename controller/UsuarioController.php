<?php
require_once 'models/Usuario.php';
require_once 'Controller.php';

class UsuarioController implements Controller
{

    public static function index()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->findAll()->fetchAll();
        include 'views/private/usuario/index.php';
    }


    public static function create()
    {

    }


    public static function save()
    {

    }


    public static function edit($id)
    {
        $id = $_GET['id'];
        $usuario = new Usuario();
        $usuario->findById($id)->fetch();
        include 'views/private/usuario/edit.php';

    }


    public static function update()
    {
        $id = $_POST['id'];


    }


    public static function destroy()
    {

    }
}