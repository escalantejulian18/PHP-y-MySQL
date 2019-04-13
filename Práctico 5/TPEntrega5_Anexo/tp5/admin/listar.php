<?php 

// Incluimos la clase de sesion
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/Singleton/Sesion.php';

// Incluimos la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/Singleton/BaseDeDatos.php';

// Obtenemos la instancia de la sesión
$oSesion = \Sgu\Singleton\Sesion::getInstance();

$query = "select 
	u.idusuario as u_idusuario,
	u.nombre as u_nombre,
	p.apellido as p_apellido,
	p.nombre as p_nombre,
	p.numerodocumento as p_numerodocumento,
	p.email as p_email,
	td.nombre as td_nombre
from 
	usuario u 
inner join 
	persona p on p.idpersona = u.idpersona
inner join 
	tipodocumento td on p.idtipodocumento = td.idtipodocumento";

$db = \Sgu\Singleton\BaseDeDatos::getInstance();

$resultado = mysql_query($query, $db->getConexion());

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Lista de Usuarios</title>
	<link type="text/css" rel="stylesheet" href="/tp5/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/menu.php'; ?>
	
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
			
			<?php while (($fila = mysql_fetch_assoc($resultado)) != false) { ?>
			<tr>
				<td><?php echo $fila['u_idusuario']; ?></td>
				<td><?php echo $fila['u_nombre']?></td>
				<td><?php echo $fila['p_apellido'] . ' ' . $fila['p_nombre']; ?></td>
				<td><?php echo $fila['td_nombre']; ?></td>
				<td><?php echo $fila['p_numerodocumento']; ?></td>
				<td><?php echo $fila['p_email']; ?></td>
				<td class="center">
					<a href="/tp5/admin/editar.php?id=<?php echo $fila['u_idusuario']; ?>" title="Editar"><img alt="Modificar" src="/tp5/includes/img/edit.png"></a>
					<a href="/tp5/admin/borrar.php?id=<?php echo $fila['u_idusuario']; ?>" title="Eliminar"><img alt="Eliminar" src="/tp5/includes/img/delete.png"></a>
				</td>
			</tr>
			<?php } ?>
			
		</table>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/footer.php'; ?>
</body>
</html>