<?php
require_once 'Model.php';
require_once 'db/Database.php';
class Juego_has_etiqueta implements Model
{
    public function findAll()
    {
        $query = "SELECT * FROM juego_has_etiqueta";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function findById($id)
    {
        $query = "SELECT * FROM juego_has_etiqueta WHERE juego_id= $id";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function store($datos)
    {
        $query = "INSERT INTO juego_has_etiqueta (juego_id, etiqueta_id) VALUE($datos[0],$datos[1])";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->exec($query);
        $db = Database::desconectar();
        return $result;
    }

    public function updateById($id, $datos)
    {
        $query = "UPDATE FROM juego_has_etiqueta SET nombre=$datos[0] WHERE id=$id";
        $db = Database::conectar();
        $db = exec($query);
        $db = Database::desconectar();
    }


    public function destroyById($id)
    {
        $db = Database::conectar();
        $query = "DELETE FROM juego_has_etiqueta WHERE juego_id=$id";
        $result = $db->query($query);
        $db = Database::desconectar();
    }
}