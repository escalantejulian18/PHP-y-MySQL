<?php

// Incluimos la clase de sesion


// Obtenemos la instancia del Registry


// Verificamos si hay un usuario logueado
if ( $oRegistry->exists('usuario_logueado') == true && $oRegistry->get('usuario_logueado') == true )
{
	// Si el usuario está logueado, lo redireccionamos hacia la sección de administración
	header('location: /tp5/admin/');
}
else
{
	// Si el usuario no ha iniciado sesión lo redireccionamos al formulario de registro
	header('location: /tp5/Paso1.php');
}