<?php
class Database
{
    private static $conexion;
    /**
     * Funcion que realiza conexion con la bd
     * 
     * @return $conexion
     */

    public static function conectar()
    {
        if (!self::$conexion) {
            self::$conexion = new PDO('mysql:host=localhost;dbname=coleccionistadigitaldb', 'root', '');
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexion;
    }

    /**
     * Funcion que cierra la conexion con la bd
     * 
     * @return void
     */
    public static function desconectar()
    {
        self::$conexion = null;
    }
}