<?php

// Incluimos la clase de sesion


// Obtenemos la instancia del Registry


// Verificamos si hay un usuario logueado
if ( $oRegistry->exists('usuario_logueado') == true && $oRegistry->get('usuario_logueado') == true )
{
	// Si el usuario est� logueado, lo redireccionamos hacia la secci�n de administraci�n
	header('location: /tp5/admin/');
}
else
{
	// Si el usuario no ha iniciado sesi�n lo redireccionamos al formulario de registro
	header('location: /tp5/Paso1.php');
}