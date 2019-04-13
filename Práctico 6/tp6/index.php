<?php

// Incluimos la clase de sesion
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

// Obtenemos la instancia del Registry
$oRegistry = \Sgu\Singleton\Sesion::getInstance()->getRegistry();

// Verificamos si hay un usuario logueado
if ( $oRegistry->exists('usuario_logueado') == true && $oRegistry->get('usuario_logueado') == true )
{
	// Si el usuario est� logueado, lo redireccionamos hacia la secci�n de administraci�n
	header('location: /tp6/admin/');
}
else
{
	// Si el usuario no ha iniciado sesi�n lo redireccionamos al formulario de registro
	header('location: /tp6/Paso1.php');
}