<?php

// Incluimos la clase de sesion
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

// Incluimos la clase Factory
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Variable que contendrá el mensaje respecto a si se pudo o no agregar al usuario
$mensaje = "";

// Obtenemos la instancia del Registry
$oRegistry = \Sgu\Singleton\Sesion::getInstance()->getRegistry();

// Inicializamos la información personal
$oInformacionPersonal = null;

// Inicializamos la información de usuario
$oInformacionUsuario = null;

// Inicializamos la información de tipo documento
$oTipoDocumento = \Sgu\ActiveRecord\ActiveRecordFactory::getTipoDocumento();

// Inicializamos la información de tipo usuario
$oTipoUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getTipoUsuario();

// Obtenemos la persona desde la sesión
if ( $oRegistry->exists('informacion_personal') == true )
{
	// Si no hay información en la sesión, inicializamos la información personal
	$oInformacionPersonal = $oRegistry->get('informacion_personal');
}

// Obtenemos el usuario desde la sesión
if ( $oRegistry->exists('informacion_usuario') == true )
{
	// Si no hay información en la sesión, inicializamos la información de usuario
	$oInformacionUsuario = $oRegistry->get('informacion_usuario');
}

// Obtener toda la información desde la sesión y persistir en la base de datos
if ( $oInformacionPersonal != null && $oInformacionUsuario != null )
{
	$oPersona = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();
	
	$oPersona->setIdTipoDocumento($oInformacionPersonal->getIdTipoDocumento());
	$oPersona->setApellido($oInformacionPersonal->getApellido());
	$oPersona->setNombre($oInformacionPersonal->getNombre());
	$oPersona->setNumeroDocumento($oInformacionPersonal->getNumeroDocumento());
	$oPersona->setSexo($oInformacionPersonal->getSexo());
	$oPersona->setNacionalidad($oInformacionPersonal->getNacionalidad());
	$oPersona->setEmail($oInformacionPersonal->getEmail());
	$oPersona->setTelefono($oInformacionPersonal->getTelefono());
	$oPersona->setCelular($oInformacionPersonal->getCelular());
	$oPersona->setDomicilio($oInformacionPersonal->getDomicilio());
	$oPersona->setProvincia($oInformacionPersonal->getProvincia());
	$oPersona->setLocalidad($oInformacionPersonal->getLocalidad());
	
	$oPersona->insert();
	
	$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();
	
	$oUsuario->setIdTipoUsuario($oInformacionUsuario->getIdTipoUsuario());
	$oUsuario->setIdPersona($oPersona->getIdPersona());
	$oUsuario->setNombre($oInformacionUsuario->getNombre());
	$oUsuario->setContrasenia($oInformacionUsuario->getContrasenia());
	
	$oUsuario->insert();
	
	// Luego de agregar toda la información, eliminamos la información de la sesión
	\Sgu\Singleton\Sesion::getInstance()->destruir();
	
	// Si se ha podido guardar la información, se establece el mensaje de éxito
	$mensaje = "Usuario registrado exitosamente";
}
else
{
	$mensaje = "No se ha completado la información de registro";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Formulario de Inscripc&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp6/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/menu.php'; ?>
	
	<fieldset>
		<legend>Registro Finalizado</legend>
		
		<div class="center mensaje">
			<p><?php echo $mensaje; ?></p>
			<p>
				<input type="button" value="Inicio" onclick="document.location='/tp6/'" class="button">
			</p>
		</div>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/footer.php'; ?>
</body>
</html>