<?php
require_once 'db/Database.php';

class Biblioteca
{
    /**
     * Funcion que accede a la bd y recoge todos los juegos almacenados en una biblioteca
     * 
     * @return $result
     */
    public function findAll()
    {
        $query = "SELECT * FROM biblioteca";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
    /**
     * Funcion que accede a la bd y recoge todos los juegos almacenados en una biblioteca filtrando por usuario
     * 
     * @return $result
     */
    public function findBibliotecaByUsuario($usuarioId)
    {

        $query = "SELECT * FROM biblioteca where usuario_id=$usuarioId";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
    /**
     * Funcion que accede a la bd y recoge todos los juegos almacenados en una biblioteca filtrando por biblioteca
     * 
     * @return $result
     */
    public function findJuegosByBiblioteca($bibliotecaId)
    {

        $query = "SELECT * FROM biblioteca_has_juego where biblioteca_id=$bibliotecaId";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
    /**
     * Funcion que accede a la bd y almacena en la base de datos un id de juego con id de biblioteca
     * 
     * @return 
     */
    public function store($datos)
    {
        $query = "INSERT INTO biblioteca_has_juego (biblioteca_id, juego_id) VALUE($datos[0],$datos[1]) ";
        $db = new Database();
        $db = Database::conectar();
        $db->exec($query);
        $db = Database::desconectar();

    }
    /**
     * Funcion que accede a la bd y crea una biblioteca con el id de un usuario
     * 
     * @return void
     */
    public function crearBiblioteca($usuario_id)
    {
        $query = "INSERT INTO biblioteca (usuario_id) VALUE($usuario_id) ";
        $db = new Database();
        $db = Database::conectar();
        $db->exec($query);
        $db = Database::desconectar();
    }
    /**
     * Funcion que accede a la bd elimina de una biblioteca un juego
     * 
     * @return void
     */
    public function destroyJuegoFromBiblioteca($bibliotecaId, $juegoId)
    {

        $query = "DELETE FROM biblioteca_has_juego WHERE biblioteca_id=$bibliotecaId[0] AND juego_id=$juegoId";
        $db = new Database();
        $db = Database::conectar();
        $db->exec($query);
    }
    /**
     * Funcion que accede a la bd y elimina una biblioteca
     * 
     * @return void
     */
    public function destroyBiblioteca($usuario_id)
    {

        $query = "DELETE FROM biblioteca WHERE usuario_id=$usuario_id";
        $db = new Database();
        $db = Database::conectar();
        $db->exec($query);
    }
}