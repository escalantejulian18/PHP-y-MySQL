<?php

// Iniciamos o restauramos la sesión
session_start();

// Verificamos si hay un usuario logueado
if ( isset($_SESSION['usuario_logueado']) == true && $_SESSION['usuario_logueado'] == true )
{
	// Si el usuario está logueado, lo redireccionamos hacia el menú
	header('location: /tp3/admin/menu.php');
}
else
{
	// Si el usuario no ha iniciado sesión lo redireccionamos al formulario de login
	header('location: /tp3/admin/login.php');
}