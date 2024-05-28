<?php
require_once 'Model.php';
require_once 'db/Database.php';
class Usuario implements Model
{

    public function findAll()
    {
        $query = "SELECT * FROM usuario";
        $db = new Database();
        $db = Database::conectar();

        $result = $db->query($query);

        $db = Database::desconectar();
        return $result;
    }

    public function findById($id)
    {
        $query = "SELECT * FROM usuario WHERE id =$id";
        $db = new Database();
        $db = Database::conectar();

        $result = $db->query($query);

        $db = Database::desconectar();
        return $result;
    }
    public function findByEmail($email)
    {
        $query = "SELECT * FROM usuario WHERE correo = '" . $email . "'";
        $db = new Database();
        $db = Database::conectar();

        $result = $db->query($query);

        $db = Database::desconectar();
        return $result;
    }

    public function maxId()
    {
        $query = "SELECT MAX(id) FROM usuario";
        $db = new Database();
        $db = Database::conectar();

        $result = $db->query($query);

        $db = Database::desconectar();
        return $result;
    }
    public function store($datos)
    {

        // $query = "INSERT INTO usuario (apodo, correo, contraseña, rol_id) VALUES('" . implode("',", array_values($datos)) . "'))";
        $query = "INSERT INTO usuario (apodo, correo, contraseña, rol_id) VALUES('$datos[0]','$datos[1]','$datos[2]',2)";

        $db = new Database();
        $db = Database::conectar();

        $result = $db->exec($query);

        $db = Database::desconectar();
        return $result;
    }

    public function updateById($id, $datos)
    {
        $query = "UPDATE usuario SET correo='$datos[0]', apodo='$datos[1]',rol_id=$datos[2] WHERE id=$id";
        $db = Database::conectar();
        $result = $db->exec($query);
        $db = Database::desconectar();
    }
    public function updateSelf($id, $datos)
    {
        $query = "UPDATE usuario SET correo='$datos[correo]', apodo='$datos[apodo]',contraseña='$datos[contrasena]' WHERE id=$id";
        $db = Database::conectar();
        $result = $db->exec($query);
        $db = Database::desconectar();
    }


    public function destroyById($id)
    {
        $db = Database::conectar();
        $query = "DELETE FROM usuario WHERE id=$id";
        $result = $db->query($query);
        $db = Database::desconectar();
    }
}