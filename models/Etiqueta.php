<?php
require_once 'Model.php';
require_once 'db/Database.php';
class Etiqueta implements Model
{
    public function findAll()
    {
        $query = "SELECT * FROM etiqueta";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function findById($id)
    {
        $query = "SELECT * FROM etiqueta WHERE id= $id";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function findByJuegoId($id)
    {
        $query = "SELECT * FROM juego_has_etiqueta WHERE juego_id=$id";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query)->fetchAll();
        $db = Database::desconectar();
        return $result;
    }
    public function store($datos)
    {
        $query = "INSERT INTO etiqueta (nombre) VALUE($datos[0])";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->exec($query);
        $db = Database::desconectar();
        return $result;
    }

    public function updateById($id, $datos)
    {
        $query = "UPDATE FROM etiqueta SET nombre=$datos[0] WHERE id=$id";
        $db = Database::conectar();
        $db = exec($query);
        $db = Database::desconectar();
    }

    public function destroyById($id)
    {
        $db = Database::conectar();
        $query = "DELETE FROM etiqueta WHERE id=$id";
        $result = $db->query($query);
        $db = Database::desconectar();
    }
    
}