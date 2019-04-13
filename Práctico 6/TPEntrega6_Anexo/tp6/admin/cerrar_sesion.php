<?php

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

// Obtenemos la sesi�n
$oSesion = \Sgu\Singleton\Sesion::getInstance();

// Destru�mos la sesi�n
$oSesion->destruir();

// Redireccionamos al formulario de login
header('location: /tp6/admin/');