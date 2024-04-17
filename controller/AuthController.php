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


        if (password_verify($contraseña, $user_log['contraseña'])) {
            $_SESSION['usuario'] = $user_log;


            switch ($user_log['rol_id']) {
                case 1:
                    # Para administrador
                    header('Location: catalogo');
                    break;
                case 2:
                    # Para cliente
                    header('Location: catalogo');
                    break;
                default:
                    # En caso de error
                    header('Location: login');
                    break;
            }
        } else {
            $_SESSION['mensaje'] = 'Error de credenciales. No son correctas';

            header('Location: login');
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
        header('Location: catalogo');
    }
    public static function logout()
    {
        if (session_id()) {
            session_destroy();
        }
    }
}