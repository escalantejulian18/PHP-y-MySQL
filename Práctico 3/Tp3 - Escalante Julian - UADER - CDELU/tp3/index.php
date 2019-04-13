<?php

// Iniciamos o restauramos la sesión
session_start();

// Verificamos si hay un usuario logueado
if ( isset($_SESSION['usuario_logueado']) == true && $_SESSION['usuario_logueado'] == true )
{
	// Si el usuario está logueado, lo redireccionamos hacia la sección de administración
	header('location: /tp3/admin/');
}
else
{
	// Si el usuario no ha iniciado sesión lo redireccionamos al formulario de registro
	header('location: /tp3/Paso1.php');
}