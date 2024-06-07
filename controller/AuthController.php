<?php
require_once 'models/Usuario.php';
require_once 'models/Biblioteca.php';
class AuthController
{
    /**
     * Funcion que dirige hacia la vista de login
     * 
     * @return void
     */
    public static function login()
    {
        include 'views/public/sesion/login.php';
    }
    /**
     * Funcion que recoge datos de formulario de login y comprueba los datos con los guardados en la BD para hacer login o redireccionar de vuelta
     * 
     * @return void
     */
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
                header('Location: dashboard');
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
    /**
     * Funcion que dirige hacia la vista de register
     * 
     */

    public static function register() : void
    {
        include 'views/public/sesion/register.php';
    }
    /**
     * Funcion que recoge los datos de el formulario de registro y los inserta en la base de datos, despues redirecciona a el catalogo
     * 
     * @return void
     */

    public static function doRegister()
    {
        $email = $_POST['email'];
        $apodo = $_POST['apodo'];
        $usuario = new Usuario();
        $biblioteca = new Biblioteca();
        $contraseña = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cont' => 4]);



        $datos = array(
            $apodo,
            $email,
            $contraseña
        );


        $usuario->store($datos);
        $nuevoUsuario = $usuario->maxId()->fetch();

        $usuario_id = $nuevoUsuario[0];
        $biblioteca->crearBiblioteca($usuario_id);

        header('Location: login');
        exit;
    }
    /**
     * Funcion que dirige hacia la vista de administrador
     * 
     * @return void
     */
    public static function dashboard()
    {

        include 'views/private/dashboard.php';
    }
    /**
     * Funcion que cierra la sesion y redirecciona al login
     * 
     * @return void
     */
    public static function logout()
    {

        unset($_SESSION['usuario']);
        header('Location: login');
        exit;
    }

}
