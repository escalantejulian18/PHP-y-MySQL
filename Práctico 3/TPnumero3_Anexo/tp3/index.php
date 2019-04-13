<?php

// Iniciamos o restauramos la sesi�n
session_start();

// Verificamos si hay un usuario logueado
if ( isset($_SESSION['usuario_logueado']) == true && $_SESSION['usuario_logueado'] == true )
{
	// Si el usuario est� logueado, lo redireccionamos hacia la secci�n de administraci�n
	header('location: /tp3/admin/');
}
else
{
	// Si el usuario no ha iniciado sesi�n lo redireccionamos al formulario de registro
	header('location: /tp3/Paso1.php');
}