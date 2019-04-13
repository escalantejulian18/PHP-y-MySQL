<?php

// Iniciamos o restauramos la sesi�n
session_start();

// Variable que contendr� el mensaje respecto a si se pudo o no agregar al usuario
$mensaje = "";

// Obtener toda la informaci�n desde la sesi�n y persistir en la base de datos


// Luego de agregar toda la informaci�n, eliminamos la informaci�n de la sesi�n
session_destroy();

// Si se ha podido guardar la informaci�n, se establece el mensaje de �xito
$mensaje = "Usuario registrado exitosamente";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Formulario de Inscripc&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp3/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/menu.php'; ?>
	
	<fieldset>
		<legend>Registro Finalizado</legend>
		
		<div class="center mensaje">
			<p><?php echo $mensaje; ?></p>
			<p>
				<input type="button" value="Inicio" onclick="document.location='/tp3/'" class="button">
			</p>
		</div>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>