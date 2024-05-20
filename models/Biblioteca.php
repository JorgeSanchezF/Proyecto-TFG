<?php
require_once 'db/Database.php';

class Biblioteca
{
    public function findAll()
    {
        $query = "SELECT * FROM biblioteca";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function findBibliotecaByUsuario($usuarioId)
    {

        $query = "SELECT * FROM biblioteca where usuario_id=$usuarioId";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
    public function findJuegosByBiblioteca($bibliotecaId)
    {

        $query = "SELECT * FROM biblioteca_has_juego where biblioteca_id=$bibliotecaId";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function store($datos)
    {
        $query = "INSERT INTO biblioteca_has_juego (biblioteca_id, juego_id) VALUE($datos[0],$datos[1]) ";
        $db = new Database();
        $db = Database::conectar();
        $db->exec($query);
        $db = Database::desconectar();

    }

    public function destroyJuegoFromBiblioteca($bibliotecaId, $juegoId)
    {

        $query = "DELETE FROM biblioteca_has_juego WHERE biblioteca_id=$bibliotecaId[0] AND juego_id=$juegoId";
        $db = new Database();
        $db = Database::conectar();
        $db->exec($query);
    }
}