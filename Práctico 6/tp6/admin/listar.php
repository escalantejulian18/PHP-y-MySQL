<?php 

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

//generamos el id de session
if (!isset($_SESSION['initiated'])){

	session_regenerate_id();
	$_SESSION['initiated'] = true;
}

// Incluimos la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/BaseDeDatos.php';

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
	<link type="text/css" rel="stylesheet" href="/tp6/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/menu.php'; ?>
	
	<fieldset>
		<legend>Lista de Usuarios</legend>
		
		<a href="../Paso1.php"><button class="button">Agregar Usuario</button></a>
		
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
				<td><?php echo htmlentities($fila['u_idusuario']); ?></td>
				<td><?php echo htmlentities($fila['u_nombre'])?></td>
				<td><?php echo htmlentities($fila['p_apellido']) . ' ' . htmlentities($fila['p_nombre']); ?></td>
				<td><?php echo htmlentities($fila['td_nombre']); ?></td>
				<td><?php echo htmlentities($fila['p_numerodocumento']); ?></td>
				<td><?php echo htmlentities($fila['p_email']); ?></td>
				<td class="center">
					<a href="/tp6/admin/editar.php?id=<?php echo $fila['u_idusuario']; ?>" title="Editar"><img alt="Modificar" src="/tp6/includes/img/edit.png"></a>
					<a href="/tp6/admin/borrar.php?id=<?php echo $fila['u_idusuario']; ?>" title="Eliminar"><img alt="Eliminar" src="/tp6/includes/img/delete.png"></a>
				</td>
			</tr>
			<?php } ?>
			
		</table>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/footer.php'; ?>
</body>
</html>