<?php 

// Incluimos la clase de sesion
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/Singleton/Sesion.php';

// Incluimos la clase factory
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Obtenemos la sesión
$oSesion = \Sgu\Singleton\Sesion::getInstance();

// Obtenemos un objeto de tipo persona
$oPersona = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();

// Obtenemos un objeto de tipo usuario
$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();

// Buscamos la persona por el número de documento
$oPersona->buscarPorNumeroDocumento($_GET['numero_documento']);

// Buscamos el usuario por el id de persona
$oUsuario->buscarPorIdPersona($oPersona->getIdPersona());

// Redireccionar hacia el script borrar pasando el id como parámetro por GET
if ( $oUsuario->getIdUsuario() != null )
{
	header('location: /tp5/admin/borrar.php?id='.$oUsuario->getIdUsuario());
}
else
{
	header('location: /tp5/admin/borrar_usuario.php');
}