<?php
// IMPORTACIONES DE CONTROLADORES
require_once "Router.php";
require_once "controllers/IndexController.php";

session_start();

$route = new Router();

$route->get('/', [IndexController::class, 'index']);

// $route->get('/login', [AuthController::class, 'login'])
//       ->get('/register', [AuthController::class, 'register'])
//       ->get('/home', [AuthController::class, 'home'])
//       ->get('/dashboard', [AuthController::class, 'dashboard'])
//       ->get('/logout', [AuthController::class, 'logout'])
//       ->get('/destroy-perfil', [PerfilController::class, 'destroy'])
//       ->get('/edit-perfil', [PerfilController::class, 'edit'])
//       ->post('update-perfil', [PerfilController::class, 'update'])
//       ->post('/doRegister', [AuthController::class, 'doRegister'])
//       ->post('/doLogin', [AuthController::class, 'doLogin']);



$route->resolver_ruta($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
