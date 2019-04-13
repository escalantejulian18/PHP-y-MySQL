<?php

// Incluimos la clase de sesion
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/Singleton/Sesion.php';

// Obtenemos la sesión
$oSesion = \Sgu\Singleton\Sesion::getInstance();

// Destruímos la sesión
$oSesion->destruir();

// Redireccionamos al formulario de login
header('location: /tp5/admin/');