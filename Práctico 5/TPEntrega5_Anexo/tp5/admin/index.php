<?php

// Incluimos la clase de sesion


// Obtenemos la instancia del Registry


// Verificamos si hay un usuario logueado
if ( $oRegistry->exists('usuario_logueado') == true && $oRegistry->get('usuario_logueado') == true )
{
	// Si el usuario est� logueado, lo redireccionamos hacia el men�
	header('location: /tp5/admin/menu.php');
}
else
{
	// Si el usuario no ha iniciado sesi�n lo redireccionamos al formulario de login
	header('location: /tp5/admin/login.php');
}