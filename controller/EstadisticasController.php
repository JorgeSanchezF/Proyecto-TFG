<?php

require_once 'models/Biblioteca.php';
require_once 'models/Juego.php';
require_once 'models/Etiqueta.php';
class EstadisticasController
{
    public static function index()
    {
        if (isset($_SESSION['usuario'])) {
            $usuarioId = $_SESSION['usuario']['id'];
            $biblioteca = new Biblioteca();
            $bibliotecaId = $biblioteca->findBibliotecaByUsuario($usuarioId)->fetch();
            $bibliotecaId = $bibliotecaId[0];
            $juegosIds = $biblioteca->findJuegosByBiblioteca($bibliotecaId)->fetchAll();
            $juego = new Juego();
            $etiqueta = new Etiqueta();

            $horasTotales = 0;
            $dineroTotal = 0;
            $juegosArray = [];
            $etiquetasArray = [];

            foreach ($juegosIds as $key => $value) {//recoge los juegos usando el id encontrado dentro de biblioteca_has_juego
                $juegos = $juego->findById($value[2])->fetch();
                $etiquetas = $etiqueta->findByJuegoId($value[2]);

                foreach ($etiquetas as $key => $k) {

                    array_push($etiquetasArray, $k[2]);
                }

                array_push($juegosArray, $juegos);

            }

            foreach ($juegosArray as $key => $value) {//cuenta el numero de horas total y el precio total entre todos los videojuegos en la biblioteca
                $horasTotales = $horasTotales + $value[3];
                $dineroTotal = $dineroTotal + $value[5];
            }

            $numeroJuegos = count($juegosArray);
            if ($numeroJuegos == 0) {//si no hay juegos redirige al catalogo
                header('Location: catalogo');
            } else {//si no permite entrar a las estadisticas
                include 'views/public/estadisticas.php';
            }
        } else {
            header('Location: catalogo');
        }
    }

        public static function save()
    {
        $juegoId = $_GET['id'];
        $usuarioId = $_SESSION['usuario']['id'];

        $biblioteca = new Biblioteca();
        $bibliotecaUsuario = $biblioteca->findBibliotecaByUsuario($usuarioId)->fetch();
        $datos = [$bibliotecaUsuario[0], $juegoId];
        $biblioteca->store($datos);
        header('Location: catalogo');
    }

       public static function destroy()
    {
        $idJuego = $_GET['id'];
        $usuarioId = $_SESSION['usuario']['id'];
        $biblioteca = new Biblioteca();
        $bibliotecaId = $biblioteca->findBibliotecaByUsuario($usuarioId)->fetch();
        $juego = new Biblioteca();
        $juego->destroyJuegoFromBiblioteca($bibliotecaId, $idJuego);
        header('Location: estadisticas');
    }
}