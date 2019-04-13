<?php 

// Iniciamos o restauramos la sesión
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Lista de Usuarios</title>
	<link type="text/css" rel="stylesheet" href="/tp3/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/menu.php'; ?>
	
	<fieldset>
		<legend>Lista de Usuarios</legend>
		
		<table>
			
			<tr>
				<th>ID</th>
				<th>USUARIO</th>
				<th>APELLIDO Y NOMBRE</th>
				<th>TIPO</th>
				<th>DOC</th>
				<th>EMAIL</th>
				<th>&nbsp;</th>
			</tr>
			
			<!-- Reemplazar por la información obtenida desde la base de datos -->
			<tr>
				<td>1</td>
				<td>admin</td>
				<td>Usuario Administrador</td>
				<td>DNI</td>
				<td>00000000</td>
				<td>correo@dominio.com.ar</td>
				<td class="center">
					<a href="/tp3/admin/editar.php?id=1" title="Editar"><img alt="Modificar" src="/tp3/includes/img/edit.png"></a>
					<a href="/tp3/admin/borrar.php?id=1" title="Eliminar"><img alt="Eliminar" src="/tp3/includes/img/delete.png"></a>
				</td>
			</tr>
			<!-- ------------------------------------------------------------- -->
			
		</table>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>