<?php 

// Incluimos la clase de sesion


// Incluimos la clase factory


// Obtenemos la instancia del Registry


// Obtenemos el id del usuario
$idUsuario = $_GET['id'];

// Obtenemos un objeto de tipo usuario


// Buscamos el usuario por su id
$oUsuario->fetch($idUsuario);

// Obtenemos el nombre del usuario en base a su id
$usuario = $oUsuario->getNombre();

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
	
	<form action="/tp5/admin/eliminar_usuario.php" method="get">
		
		<input type="hidden" name="id" value="<?php echo $idUsuario; ?>">
		
		<fieldset>
			<legend>Borrar Usuario</legend>
			
			<div class="center mensaje">
				<p>
					¿Est&aacute; seguro que desea eliminar el usuario "<?php echo $usuario; ?>"?
				</p>
				<p>
					<input type="submit" value="Si" class="button">
					<input type="button" value="No" class="button" onclick="history.back();">
				</p>
			</div>
			
		</fieldset>
	
	</form>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/footer.php'; ?>
</body>
</html>