<?php
require_once 'Controller.php';
require_once 'models/Biblioteca.php';
require_once 'models/Juego.php';
class EstadisticasController implements Controller
{
    public static function index()
    {
        $usuarioId = $_SESSION['usuario']['id'];
        $biblioteca = new Biblioteca();
        $bibliotecaId = $biblioteca->findBibliotecaByUsuario($usuarioId)->fetch();
        $bibliotecaId = $bibliotecaId[0];
        $juegosIds = $biblioteca->findJuegosByBiblioteca($bibliotecaId)->fetchAll();
        $juego = new Juego();
        $horasTotales = 0;
        $dineroTotal = 0;
        $juegosArray = [];

        foreach ($juegosIds as $key => $value) {//recoge los juegos usando el id encontrado dentro de biblioteca_has_juego
            $juegos = $juego->findById($value[2])->fetch();
            array_push($juegosArray, $juegos);
        }

        foreach ($juegosArray as $key => $value) {//cuenta el numero de horas total y el precio total entre todos los videojuegos en la biblioteca
            $horasTotales = $horasTotales + $value[3];
            $dineroTotal = $dineroTotal + $value[5];
        }

        $numeroJuegos = count($juegosArray);
        include 'views/public/estadisticas.php';
    }

    public static function create()
    {
    }

    public static function save()
    {
    }

    public static function edit($id)
    {
    }

    public static function update()
    {
    }

    public static function destroy()
    {
    }
}