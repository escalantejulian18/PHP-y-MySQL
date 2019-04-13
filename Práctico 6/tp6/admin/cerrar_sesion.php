<?php

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

//generamos el id de session
if (!isset($_SESSION['initiated'])){

	session_regenerate_id();
	$_SESSION['initiated'] = true;
}

// Obtenemos la sesi�n
$oSesion = \Sgu\Singleton\Sesion::getInstance();

// Destru�mos la sesi�n
$oSesion->destruir();

// Redireccionamos al formulario de login
header('location: /tp6/admin/');