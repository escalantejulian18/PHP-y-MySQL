<?php 

// Incluimos la clase de sesion
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/Singleton/Sesion.php';

// Incluimos la clase factory
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Obtenemos la instancia de la sesión
$oSesion = \Sgu\Singleton\Sesion::getInstance();

// Obtenemos el id del usuario
$idUsuario = $_GET['id'];

// Obtenemos un objeto de tipo persona
$oPersona = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();

// Obtenemos un objeto de tipo usuario
$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();

// Buscamos el usuario por su id
$oUsuario->fetch($idUsuario);

// Eliminamos el usuario y la persona de la base de datos
$oUsuario->delete($oUsuario->getIdUsuario());

$oPersona->delete($oUsuario->getIdPersona());

// Redireccionamos hacia el menú
header('location: /tp5/admin/listar.php');