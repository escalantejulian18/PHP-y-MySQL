<?php

// Incluimos la clase de sesion


// Incluimos la clase Factory


// Variable que contendr� el mensaje respecto a si se pudo o no agregar al usuario
$mensaje = "";

// Obtenemos la instancia del Registry


// Inicializamos la informaci�n personal
$oInformacionPersonal = null;
$oTipoDocumento = null;

// Inicializamos la informaci�n de usuario
$oInformacionUsuario = null;
$oTipoUsuario = null;

// Obtenemos un objeto de tipo de documento


// Obtenemos un objeto de tipo de usuario



// Obtenemos la persona desde la sesi�n
if ( $oRegistry->exists('informacion_personal') == true )
{
	// Si no hay informaci�n en la sesi�n, inicializamos la informaci�n personal
	$oInformacionPersonal = $oRegistry->get('informacion_personal');
}

// Obtenemos el usuario desde la sesi�n
if ( $oRegistry->exists('informacion_usuario') == true )
{
	// Si no hay informaci�n en la sesi�n, inicializamos la informaci�n de usuario
	$oInformacionUsuario = $oRegistry->get('informacion_usuario');
}

// Obtener toda la informaci�n desde la sesi�n y persistir en la base de datos
if ( $oInformacionPersonal != null && $oInformacionUsuario != null )
{
	// Obtenemos un objeto de persona
	
	
	// Asignamos los valores a nuestro objeto persona desde el objeto obtenido en la sesi�n
	
	
	// Insettamos la persona en la base de datos
	$oPersona->insert();
	
	
	// Obtenemos un objeto de usuario
	
	
	// Asignamos los valores a nuestro objeto usuario desde el objeto obtenido en la sesi�n
	
	
	// Insertamos el usuario
	$oUsuario->insert();
	
	// Luego de agregar toda la informaci�n, eliminamos la informaci�n de la sesi�n
	
	
	// Si se ha podido guardar la informaci�n, se establece el mensaje de �xito
	$mensaje = "Usuario registrado exitosamente";
}
else
{
	$mensaje = "No se ha completado la informaci�n de registro";
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