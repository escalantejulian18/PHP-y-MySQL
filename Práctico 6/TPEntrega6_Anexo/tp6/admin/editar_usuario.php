<?php 

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Obtenemos la instancia de la sesión
$oSesion = \Sgu\Singleton\Sesion::getInstance();

// Obtenemos el id del usuario
$idUsuario = $_POST['idUsuario'];

// Eliminamos el usuario desde la base de datos
$oPersona = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();
$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();

$oUsuario->fetch($idUsuario);
$oPersona->fetch($oUsuario->getIdPersona());

// Guardamos la información obtenida en la base de datos
$oUsuario->setIdTipoUsuario($_POST['tipo_usuario']);
$oUsuario->setNombre($_POST['nombre_usuario']);
$oUsuario->setContrasenia($_POST['contrasenia']);

$oPersona->setIdTipoDocumento($_POST['tipo_documento']);
$oPersona->setApellido($_POST['apellido']);
$oPersona->setNombre($_POST['nombre']);
$oPersona->setNumeroDocumento($_POST['numero_documento']);
$oPersona->setSexo($_POST['sexo']);
$oPersona->setNacionalidad($_POST['nacionalidad']);
$oPersona->setEmail($_POST['email']);
$oPersona->setTelefono($_POST['telefono']);
$oPersona->setCelular($_POST['celular']);
$oPersona->setDomicilio($_POST['domicilio']);
$oPersona->setProvincia($_POST['provincia']);
$oPersona->setLocalidad($_POST['localidad']);

$oUsuario->update($oUsuario->getIdUsuario());
$oPersona->update($oPersona->getIdPersona());

// Redireccionamos hacia el menú
header('location: /tp6/admin/');