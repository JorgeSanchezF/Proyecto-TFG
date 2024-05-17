<?php
// IMPORTACIONES DE CONTROLADORES MEDIANTE autoload.php
require_once 'autoload.php';
require_once 'Router.php';


session_start();



$route = new Router();

$route->get('/', [IndexController::class, 'index'])
    ->get('/catalogo', [CatalogoController::class, 'index'])
    ->get('/login', [AuthController::class, 'login'])
    ->get('/register', [AuthController::class, 'register'])
    ->get('/logout', [AuthController::class, 'logout'])
    ->get('/dashboard', [AuthController::class, 'dashboard'])
    ->get('/juego', [CatalogoController::class, 'juegoDetalles'])
    ->get('/catalogo-admin', [CatalogoController::class, 'catalogoAdmin'])
    ->get('/catalogo-create', [CatalogoController::class, 'create'])
    ->get('/catalogo-edit', [CatalogoController::class, 'edit'])
    ->get('/catalogo-delete', [CatalogoController::class, 'destroy'])
    ->get('/anadir-juego', [EstadisticasController::class, 'save'])
    ->get('/usuario-admin', [UsuarioController::class, 'index'])
    ->get('/usuario-edit', [UsuarioController::class, 'edit'])
    ->get('/usuario-delete', [UsuarioController::class, 'destroy'])
    ->get('/usuario-deleteself', [UsuarioController::class, 'destroySelf'])
    ->get('/usuario-editself', [UsuarioController::class, 'editSelf'])
    ->get('/estadisticas', [EstadisticasController::class, 'index'])
    ->get('/eliminar-juego', [EstadisticasController::class, 'destroy'])
    ->get('/resenas', [ResenaController::class, 'index'])
    ->get('/resenas-crear', [ResenaController::class, 'create'])
    ->get('/perfil', [UsuarioController::class, 'perfil'])
    ->post('/catalogo-save', [CatalogoController::class, 'save'])
    ->post('/catalogo-update', [CatalogoController::class, 'update'])
    ->post('/doLogin', [AuthController::class, 'doLogin'])
    ->post('/doRegister', [AuthController::class, 'doRegister'])
    ->post('/usuario-update', [UsuarioController::class, 'update']);
$route->resolver_ruta($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
