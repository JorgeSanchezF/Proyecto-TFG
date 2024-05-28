<?php
require_once 'models/Usuario.php';
require_once 'models/Biblioteca.php';

class UsuarioController
{
    /**
     * Funcion que dirige hacia la vista de administracion de usuarios
     * 
     * @return void
     */
    public static function index()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->findAll()->fetchAll();
        include 'views/private/usuario/index.php';
    }
    /**
     * Funcion que dirige hacia la vista de perfil de usuario o devuelve a login si no hay sesion iniciada
     * 
     * @return void
     */
    public static function perfil()
    {
        if (isset($_SESSION['usuario'])) {
            $usuario = new Usuario();
            $usuarios = $usuario->findById($_SESSION['usuario']['id'])->fetch();
            include 'views/public/perfil/perfil.php';
        } else {
            header('Location: login');
        }

    }

    /**
     * Funcion que dirige hacia la vista de edicion de usuario por administrador
     * @param $id
     * @return void
     */
    public static function edit($id)
    {
        $id = $_GET['id'];
        $usuario = new Usuario();
        $usuarios = $usuario->findById($id)->fetch();
        include 'views/private/usuario/edit.php';

    }
    /**
     * Funcion que dirige hacia la vista de edicion del propio usuario
     * @param $id
     * @return void
     */
    public static function editSelf($id)
    {
        $id = $_GET['id'];
        $usuario = new Usuario();
        $usuarios = $usuario->findById($id)->fetch();
        include 'views/public/perfil/edit.php';

    }

    /**
     * Funcion que recoge los datos de el formulario de edicion de perfil y guarda los cambios en la bd, despues redirige a usuario admin
     * 
     * @return void
     */
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
        $usuario->updateById($id, $datos);
        if ($_SESSION['usuario']['id'] == 1) {
            header('Location: usuario-admin');
        } else {
            header('Location: perfil');
        }

    }
    /**
     * Funcion que recoge los datos de el formulario de edicion de perfil y guarda los cambios en la bd, despues redirige a la vista del perfil
     * 
     * @return void
     */
    public static function updateSelf()
    {
        $id = $_POST['id'];
        $correo = $_POST['correo'];
        $apodo = $_POST['apodo'];
        $contraseña = $_POST['contrasena'];
        $contraseña = password_hash($contraseña, PASSWORD_BCRYPT, ['cont' => 4]);

        $datos = [
            'correo' => $correo,
            'apodo' => $apodo,
            'contrasena' => $contraseña
        ];

        $usuario = new Usuario();
        $usuario->updateSelf($id, $datos);

        header('Location: perfil');
    }
    /**
     * Funcion que elimina el usuario de motu proprio y devuelve a la vista de catalogo
     * 
     * @return void
     */
    public static function destroySelf()
    {
        $id = $_GET['id'];
        $usuario = new Usuario();
        $biblioteca = new Biblioteca();
        $usuario->destroyById($id);
        $biblioteca->destroyBiblioteca($id);
        header('Location: catalogo');
    }
    /**
     * Funcion que elimina un usuario y redirige a la seccion de administracion
     * @return void
     */

    public static function destroy()
    {
        $id = $_GET['id'];
        $usuario = new Usuario();
        $usuario->destroyById($id);
        header('Location: usuario-admin');
    }
}