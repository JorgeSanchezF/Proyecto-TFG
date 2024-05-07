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
    public function maxId()
    {
        $query = "SELECT * FROM juego ORDER BY id DESC LIMIT 1";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
    public function store($datos)
    {

        $query = "INSERT INTO juego (nombre, precio, descripcion, duracion, plataforma,imagen) VALUES('$datos[0]','$datos[1]','$datos[2]',$datos[3],'$datos[4]','$datos[5]')";

        $db = new Database();
        $db = Database::conectar();

        $result = $db->exec($query);

        $db = Database::desconectar();
        return $result;
    }

    public function updateById($id, $datos)
    {
        $query = "UPDATE juego SET nombre='$datos[0]', descripcion='$datos[1]', duracion=$datos[2], plataforma='$datos[3]', precio=$datos[4], imagen='$datos[5]' WHERE id=$id";

        $db = Database::conectar();
        $db->exec($query);
        $db = Database::desconectar();
    }

    public function destroyById($id)
    {
        $query = "DELETE FROM juego WHERE id=$id";
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
    }
}