<?php

// Incluimos la clase de sesion


// Incluimos la clase Factory


// Variable que contendrá el mensaje respecto a si se pudo o no agregar al usuario
$mensaje = "";

// Obtenemos la instancia del Registry


// Inicializamos la información personal
$oInformacionPersonal = null;
$oTipoDocumento = null;

// Inicializamos la información de usuario
$oInformacionUsuario = null;
$oTipoUsuario = null;

// Obtenemos un objeto de tipo de documento


// Obtenemos un objeto de tipo de usuario



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
	// Obtenemos un objeto de persona
	
	
	// Asignamos los valores a nuestro objeto persona desde el objeto obtenido en la sesión
	
	
	// Insettamos la persona en la base de datos
	$oPersona->insert();
	
	
	// Obtenemos un objeto de usuario
	
	
	// Asignamos los valores a nuestro objeto usuario desde el objeto obtenido en la sesión
	
	
	// Insertamos el usuario
	$oUsuario->insert();
	
	// Luego de agregar toda la información, eliminamos la información de la sesión
	
	
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
	<link type="text/css" rel="stylesheet" href="/tp5/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/menu.php'; ?>
	
	<fieldset>
		<legend>Registro Finalizado</legend>
		
		<div class="center mensaje">
			<p><?php echo $mensaje; ?></p>
			<p>
				<input type="button" value="Inicio" onclick="document.location='/tp5/'" class="button">
			</p>
		</div>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/footer.php'; ?>
</body>
</html>