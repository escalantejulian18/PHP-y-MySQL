<?php 

// Iniciamos o restauramos la sesión
session_start();

// Inicializamos la variable que contendra el mensaje respecto al inicio de sesión
$mensaje = "";

// Verificamos si se han enviado las credenciales
if ( isset($_POST['nombre_usuario'], $_POST['contrasenia']) == true && $_POST['nombre_usuario'] != null && $_POST['contrasenia'] != null )
{
	// Debemos conprobar contra la base de datos si las credenciales son correctas
	
	// Si las credenciales son correctas debemos establecer los valores en las variables de sesión
	// y luego redireccionarlo hacia el menú de administración
	
	// Si las credenciales no son correctas debemos informarle al usuario el debido mensaje
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
	<link type="text/css" rel="stylesheet" href="/tp3/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/header.php'; ?>
	
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

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>