<?php 

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

//generamos el id de session
if (!isset($_SESSION['initiated'])){

	session_regenerate_id();
	$_SESSION['initiated'] = true;
}


// Incluimos la clase Factory
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Obtenemos la instancia del Registry
$oRegistry = \Sgu\Singleton\Sesion::getInstance()->getRegistry();

// Inicializamos la variable que contendra el mensaje respecto al inicio de sesión
$mensaje = "";

// Verificamos si se han enviado las credenciales
if ( isset($_POST['nombre_usuario'], $_POST['contrasenia']) == true && $_POST['nombre_usuario'] != null && $_POST['contrasenia'] != null )
{
	// Debemos conprobar contra la base de datos si las credenciales son correctas
	
	if (ctype_alnum($_POST['nombre_usuario']) && ctype_alnum($_POST['contrasenia'])){
	
		$usuario = mysql_escape_string($_POST['nombre_usuario']);
		$password = mysql_escape_string($_POST['contrasenia']);
	
	
		$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();
		
		// Si las credenciales son correctas debemos establecer los valores en las variables de sesión
		// y luego redireccionarlo hacia el menú de administración
		
		//if ( $oUsuario->buscarPorUsuarioContrasenia($_POST['nombre_usuario'], $_POST['contrasenia']) == true )
		if ( $oUsuario->buscarPorUsuarioContrasenia($usuario, $password) == true )
		{
			if ($_SESSION['HUA'] != md5($_SERVER['HTTP_USER_AGENT'])) {
				die('Usted cambio de navegador!!');
			}
			
			$oPersona = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();
			
			$oPersona->fetch($oUsuario->getIdPersona());
			
			$oRegistry->add('usuario_logueado', true);
			$oRegistry->add('usuario', $oUsuario);
			$oRegistry->add('persona', $oPersona);
			
			header('location: /tp6/admin/');	
		}
		else
		{
			// Si las credenciales no son correctas debemos informarle al usuario el debido mensaje
		
			$mensaje = "Usuario y/o contraseña incorrectos";
		}
	}
	else
	{	
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
	<link type="text/css" rel="stylesheet" href="/tp6/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/header.php'; ?>
	
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

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/footer.php'; ?>
</body>
</html>