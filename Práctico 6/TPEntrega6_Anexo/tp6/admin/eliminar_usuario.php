<?php 

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Obtenemos la instancia de la sesión
$oSesion = \Sgu\Singleton\Sesion::getInstance();

// Obtenemos el id del usuario
$idUsuario = $_GET['id'];

// Eliminamos el usuario desde la base de datos
$oPersona = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();
$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();

$oUsuario->fetch($idUsuario);

$oUsuario->delete($oUsuario->getIdUsuario());

$oPersona->delete($oUsuario->getIdPersona());

// Redireccionamos hacia el menú
header('location: /tp6/admin/');