<?php
require_once 'models/Usuario.php';
class AuthController
{
    public static function login()
    {
        include 'views/public/sesion/login.php';
    }

    public static function doLogin()
    {
        $email = $_POST['email'];
        $contraseña = $_POST['password'];


        $usuario = new Usuario();

        $user_log = $usuario->findByEmail($email)->fetch();
        // var_dump($email);
        // var_dump($contraseña);
        // var_dump($user_log);
        // exit;

        if (password_verify($contraseña, $user_log['contraseña'])) {
            $_SESSION['usuario'] = $user_log;

            if ($user_log['rol_id'] == 1) {
                header('Location: catalogo');
                exit;
            } else {
                header('Location: catalogo');
                exit;
            }


        } else {


            header('Location: login');
            exit;
        }
    }

    public static function register()
    {
        include 'views/public/sesion/register.php';
    }

    public static function doRegister()
    {
        $email = $_POST['email'];
        $apodo = $_POST['apodo'];
        $contraseña = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cont' => 4]);


        $usuario = new Usuario();
        $datos = array(
            $apodo,
            $email,
            $contraseña
        );


        $usuario->store($datos);
        header('Location: login');
        exit;
    }
    public static function logout()
    {
        var_dump($_SESSION['usuario']);
        exit;
        if ($_SESSION['user'] != null) {
            session_destroy();
            header('Location: login');
            exit;
        } else {
            header('Location: catalogo');
            exit;
        }

    }
}