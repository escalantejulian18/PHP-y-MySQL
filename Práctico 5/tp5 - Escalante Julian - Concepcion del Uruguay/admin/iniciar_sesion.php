<?php 


// Incluimos la clase de sesion
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/Singleton/Sesion.php';

// Incluimos la clase Factory
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/ActiveRecordFactory.php';


// Obtenemos la instancia del Registry
$oRegistry = \Sgu\Singleton\Sesion::getInstance()->getRegistry();

// Inicializamos la variable que contendra el mensaje respecto al inicio de sesión
$mensaje = "";

// Verificamos si se han enviado las credenciales
if ( isset($_POST['nombre_usuario'], $_POST['contrasenia']) == true && $_POST['nombre_usuario'] != null && $_POST['contrasenia'] != null )
{
	// Obtenemos un objeto del tipo usuario
	$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();
	
	// Si las credenciales son correctas debemos establecer los valores en las variables de sesión
	// y luego redireccionarlo hacia el menú de administración
	
	// Debemos comprobar contra la base de datos si las credenciales son correctas
	if ( $oUsuario->buscarPorUsuarioContrasenia($_POST['nombre_usuario'], $_POST['contrasenia']) == true )
	{
		// Obtenemos un objeto del tipo persona
		$oPersona = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();
		
		// Buscamos la persona relacionada al usuario
		$oPersona->fetch($oUsuario->getIdPersona());
		
		// Agregamos a la sesión las claves de inicio de sesión
		$oRegistry->add('usuario_logueado', true);
		$oRegistry->add('usuario', $oUsuario);
		$oRegistry->add('persona', $oPersona);
		
		header('location: /tp5/admin/menu.php');
	}
	else
	{
		// Si las credenciales no son correctas debemos informarle al usuario el debido mensaje
	
		$mensaje = "Usuario y/o contraseña incorrectos";
	}
}
else
{
	$mensaje = "No se han ingresado las credenciales de acceso";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Iniciar Sesi&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp5/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/header.php'; ?>
	
	<fieldset>
		<legend>Validaci&oacute;n de credenciales</legend>
		
		<div class="center mensaje">
			<p><?php echo $mensaje; ?></p>
			<p>
				<input type="button" value="Volver" onclick="history.back();" class="button">
			</p>
		</div>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/footer.php'; ?>
</body>
</html>