<?php


class Router
{


    private array $rutas = array();


    public function get(string $ruta, array $accion): Router
    {
        $this->rutas['GET'][$ruta] = $accion;
        return $this;
    }


    public function post(string $ruta, array $accion): Router
    {
        $this->rutas['POST'][$ruta] = $accion;
        return $this;
    }



    public function resolver_ruta(string $url, string $method)
    {
        $path = parse_url($url)['path'];

        $query = null;


        if (isset(parse_url($url)['query'])) {

            $query = parse_url($url, PHP_URL_QUERY);


            parse_str($query, $query);
        }



        $path2 = explode("/", $path);





        $ruta = '/' . $path2[count($path2) - 1];



        $clase = $this->rutas[$method][$ruta][0];

        $function = $this->rutas[$method][$ruta][1];




        return call_user_func($clase . '::' . $function, $query);
    }
}
