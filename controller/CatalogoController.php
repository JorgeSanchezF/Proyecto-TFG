<?php
require_once 'Controller.php';
require_once 'models/Juego.php';
require_once 'models/Juego_has_etiqueta.php';

class CatalogoController implements Controller
{
    /**
     * Funcion que dirige hacia la vista de catálogo
     * 
     * @return void
     */
    public static function index()
    {
        $juego = new Juego();
        $juegos = $juego->findAll()->fetchAll();

        include 'views/public/catalogo.php';
    }

    /**
     * Funcion que dirige hacia la vista de administracion de catalogo
     * 
     * @return void
     */
    public static function catalogoAdmin()
    {
        $juego = new Juego();
        $juegos = $juego->findAll()->fetchAll();

        // var_dump($_SESSION['usuario'][4]);
        // exit;

        //si el rol de usuario que entra en esta funcion es igual a 1 entra en la seccion de admin si no de vuelve a el catalogo publico
        if ($_SESSION['usuario'][4] == 1) {

            include 'views/private/catalogo/index.php';
        } else {
            header('Location: catalogo');
        }

    }
    /**
     * Funcion que dirige hacia la vista de detalles de juego
     * 
     * @return void
     */

    public static function juegoDetalles()
    {
        $id = $_GET['id'];

        $juego = new Juego();
        $etiqueta = new Juego_has_etiqueta();

        $juegos = $juego->findById($id)->fetch();
        $etiquetas = $etiqueta->findById($id)->fetchAll();

        include 'views/private/catalogo/detalles.php';
    }
    /**
     * Funcion que dirige hacia la vista de creacion de juegos
     * 
     * @return void
     */
    public static function create()
    {

        include 'views/private/catalogo/create.php';
    }
    /**
     * Funcion que recoge datos de formulario de creacion de juegos y lo inserta en la BD, despues redirige a seccion de administracion
     * de catalogo
     * 
     * @return void
     */

    public static function save()
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $duracion = $_POST['duracion'];
        $plataformas = $_POST['plataformas'];
        $etiquetas = $_POST['etiquetas'];

        $plataformasTexto = implode(', ', $plataformas);

        $imagen = preg_replace('/[^a-zA-Z0-9]/', '', $nombre);
        $imagen = strtolower($imagen);

        $datos = [
            $nombre,
            $precio,
            $descripcion,
            $duracion,
            $plataformasTexto,
            $imagen
        ];


        $juego = new Juego();
        $juego_has_etiqueta = new Juego_has_etiqueta();
        $juego->store($datos);
        $ultimoJuego = $juego->maxId()->fetch();

        foreach ($etiquetas as $key => $value) {

            $datosEtiqueta = [
                $ultimoJuego[0],
                $value
            ];

            $juego_has_etiqueta->store($datosEtiqueta);

        }
        header('Location: catalogo-admin');

    }
    /**
     * Funcion que dirige hacia la vista de edicion de juego, recoge los datos de la bd para mostrar los valores guardados
     * 
     * @param $id 
     * @return void
     */

    public static function edit($id)
    {
        $id = $_GET['id'];
        $juego = new Juego();
        $juegos = $juego->findById($id)->fetch();
        include 'views/private/catalogo/edit.php';
    }
    /**
     * Funcion que recoge los datos de el formulario de edicion de juegos y guarda los cambios en la bd
     * 
     * @return void
     */
    public static function update()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $duracion = $_POST['duracion'];
        $plataformas = $_POST['plataformas'];
        $etiquetas = $_POST['etiquetas'];

        $plataformasTexto = implode(', ', $plataformas);

        $imagen = preg_replace('/[^a-zA-Z0-9]/', '', $nombre);
        $imagen = strtolower($imagen);

        $datos = [
            $nombre,
            $descripcion,
            $duracion,
            $plataformasTexto,
            $precio,
            $imagen
        ];

        $juego = new Juego();
        $etiqueta = new Juego_has_etiqueta();

        $juego->updateById($id, $datos);
        $etiqueta->destroyById($id);

        foreach ($etiquetas as $key => $value) {

            $datosEtiqueta = [
                $id,
                $value
            ];

            $etiqueta->store($datosEtiqueta);

        }

        header('Location: catalogo-admin');

    }
    /**
     * Funcion que elimina un juego de la bd y redirige a la seccion de administracion de catalogo
     * 
     * @return void
     */
    public static function destroy()
    {
        $id = $_GET['id'];

        $juego = new Juego();
        $juego->destroyById($id);
        header('Location: catalogo-admin');
    }
}