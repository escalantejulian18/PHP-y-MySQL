<?php 

// Iniciamos o restauramos la sesión
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Men&uacute; de Administraci&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp3/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/menu.php'; ?>
	
	<fieldset>
		<legend>Men&uacute; de Administraci&oacute;n</legend>
		
		<ul class="menu_aplicacion">
			<li><a href="/tp3/admin/listar.php"><img alt="Listar Usuarios" src="/tp3/includes/img/list.png"><br>Listar Usuarios</a></li>
			<li><a href="/tp3/admin/borrar_usuario.php"><img alt="Eliminar Usuario" src="/tp3/includes/img/user-remove.png"><br>Eliminar Usuario</a></li>
		</ul>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>
