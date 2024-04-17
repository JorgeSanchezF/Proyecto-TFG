<?php
// IMPORTACIONES DE CONTROLADORES MEDIANTE autoload.php
require_once 'autoload.php';
require_once 'Router.php';


session_start();
$_SESSION['usuario'] = '';
$route = new Router();

$route->get('/', [IndexController::class, 'index'])
    ->get('/catalogo', [CatalogoController::class, 'index'])
    ->get('/login', [AuthController::class, 'login'])
    ->get('/register', [AuthController::class, 'register'])
    ->post('/doLogin', [AuthController::class, 'doLogin'])
    ->post('/doRegister', [AuthController::class, 'doRegister']);

$route->resolver_ruta($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
