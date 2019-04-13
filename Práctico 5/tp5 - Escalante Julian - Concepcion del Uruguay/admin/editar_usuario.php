<?php 

// Incluimos la clase de sesion
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/Singleton/Sesion.php';

// Incluimos la clase factory
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Obtenemos la instancia de la sesión
$oSesion = \Sgu\Singleton\Sesion::getInstance();

// Obtenemos el id del usuario
$idUsuario = $_POST['idUsuario'];

// Obtenemos un objeto de tipo persona
$oPersona = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();

// Obtenemos un objeto de tipo usuario
$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();

// Buscamos el usuario por su id
$oUsuario->fetch($idUsuario);

// Buscamos la persona por su id
$oPersona->fetch($oUsuario->getIdPersona());

// Establecemos los valores del usuario
$oUsuario->setIdTipoUsuario($_POST['tipo_usuario']);
$oUsuario->setNombre($_POST['nombre_usuario']);
$oUsuario->setContrasenia($_POST['contrasenia']);

// Establecemos los valores de la persona
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

// Guardamos la información de usuario y persona obtenidas en la base de datos
$oUsuario->update($oUsuario->getIdUsuario());
$oPersona->update($oUsuario->getIdPersona());

// Redireccionamos hacia el menú
header('location: /tp5/admin/listar.php');