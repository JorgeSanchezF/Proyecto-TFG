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
        $usuarios = $usuario->findById($id)->fetch();
        include 'views/private/usuario/edit.php';

    }


    public static function update()
    {
        $id = $_POST['id'];
        $correo = $_POST['correo'];
        $apodo = $_POST['apodo'];
        $rol = $_POST['rol'];

        $datos = [
            'correo' => $correo,
            'apodo' => $apodo,
            'rol_id' => $rol
        ];

        $usuario = new Usuario();
        $usaurios = $usuario->updateById($id, $datos);
        header('Location: usuario-admin');
    }


    public static function destroy()
    {
        $id = $_GET['id'];
        $usuario = new Usuario();
        $usuarios = $usuario->destroyById($id);
        header('Location: usuario-admin');
    }
}