<?php 

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Obtenemos la sesión
$oSesion = \Sgu\Singleton\Sesion::getInstance();

// Obtener el id del usuario desde la base de datos
$oPersona = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();
$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();

$oPersona->buscarPorNumeroDocumento($_GET['numero_documento']);
$oUsuario->buscarPorIdPersona($oPersona->getIdPersona());

// Redireccionar hacia el script borrar pasando el id como parámetro por GET
if ( $oUsuario->getIdUsuario() != null )
{
	header('location: /tp6/admin/borrar.php?id=' . $oUsuario->getIdUsuario());
}
else
{
	header('location: /tp6/admin/borrar_usuario.php');
}