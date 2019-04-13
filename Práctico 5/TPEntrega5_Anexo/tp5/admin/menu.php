<?php 

// Incluimos la clase de sesion


// Obtenemos la instancia de sesion


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Men&uacute; de Administraci&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp5/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/menu.php'; ?>
	
	<fieldset>
		<legend>Men&uacute; de Administraci&oacute;n</legend>
		
		<ul class="menu_aplicacion">
			<li><a href="/tp5/admin/listar.php"><img alt="Listar Usuarios" src="/tp5/includes/img/list.png"><br>Listar Usuarios</a></li>
			<li><a href="/tp5/admin/borrar_usuario.php"><img alt="Eliminar Usuario" src="/tp5/includes/img/user-remove.png"><br>Eliminar Usuario</a></li>
		</ul>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/footer.php'; ?>
</body>
</html>