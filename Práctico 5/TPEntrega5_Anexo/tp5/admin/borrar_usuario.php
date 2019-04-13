<?php 

// Incluimos la clase de sesion


// Obtenemos la instancia del Registry


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Borrar Usuario</title>
	<link type="text/css" rel="stylesheet" href="/tp5/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/menu.php'; ?>
	
	<form action="/tp5/admin/buscar.php" method="get">
		
		<fieldset>
			<legend>Borrar Usuario</legend>
			
			<ul>
				<li><label>N&uacute;mero de Documento:</label></li>
				<li>
					<input type="text" name="numero_documento">
					<input type="submit" value="Borrar" class="button">
				</li>
			</ul>
			
		</fieldset>
	
	</form>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/footer.php'; ?>
</body>
</html>