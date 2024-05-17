<?php
require_once 'Model.php';
require_once 'db/Database.php';
class Resena implements Model
{
    public function findAll()
    {
        $query = "SELECT * FROM reseña";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function findById($id)
    {
        $query = "SELECT * FROM reseña WHERE id=$id";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
    public function findByUsuarioId($id)
    {
        $query = "SELECT * FROM reseña WHERE usuario_id=$id";
        $db = new Database();
        $db = Database::conectar();
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function store($datos)
    {
        $query = "INSERT INTO reseña(texto, puntuacion, duracion, usuario_id, juego_id)VALUES('$datos[0]',$datos[1],$datos[2],$datos[3],$datos[4])";
        $db = new Database();
        $db = Database::conectar();
        $db->query($query);
        $db = Database::desconectar();

    }

    public function updateById($id, $datos)
    {
    }

    public function destroyById($id)
    {
        $query = "DELETE reseña WHERE id=$id";
        $db = new Database();
        $db = Database::conectar();
        $db->query($query);
        $db = Database::desconectar();
    }
}