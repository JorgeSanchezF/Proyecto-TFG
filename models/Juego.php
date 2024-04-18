<?php
require_once 'Model.php';
require_once 'db/Database.php';
class Juego implements Model
{
    public function findAll()
    {
        $query = "SELECT * FROM juego";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function findById($id)
    {
        $query = "SELECT * FROM juego WHERE id=$id";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function store($datos)
    {
        $query = "INSERT INTO juego (nombre, precio, descripcion, duracion, plataforma) VALUES('$datos[0]','$datos[1]','$datos[2]',$datos[3],$datos[4])";

        $db = new Database();
        $db = Database::conectar();

        $result = $db->exec($query);

        $db = Database::desconectar();
        return $result;
    }

    public function updateById($id, $datos)
    {
        $query = "UPDATE FROM juego (" . implode(".", array_keys($datos)) . ", rol_id)VALUES('" . implode("',", array_values($datos)) . "' WHERE id=$id)";
        $db = Database::conectar();
        $db = exec($query);
        $db = Database::desconectar();
    }

    public function destroyById($id)
    {
        $db = Database::conectar();
        $query = "DELETE FROM juego WHERE id=$id";
        $result = $db->query($query);
        $db = Database::desconectar();
    }
}