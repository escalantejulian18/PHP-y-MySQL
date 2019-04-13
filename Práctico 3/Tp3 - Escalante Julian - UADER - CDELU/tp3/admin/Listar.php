<?php 

// Iniciamos o restauramos la sesión
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/tp3/Includes/PHP/Conexion.php');

$conexion = conectarBD();

$query = " select 
		   p.idpersona,
		   p.numerodocumento,
		   p.apellido,
		   p.nombre,
		   p.idtipodocumento,
		   p.email,	
           td.nombredocumento
		   
		   from persona p
		   inner join tipodocumento td
		   on td.idtipodocumento = p.idtipodocumento";

$resultado = mysql_query($query,$conexion);

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
		<a href='/tp3/Paso1.php'><button>Registrar Persona</button></a>
		
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
				
				<?php 
	    			$fila='';
	    
	   				 while (( $fila = mysql_fetch_assoc($resultado)) != false ){
	   				 
	   				 	$query="SELECT * FROM usuario WHERE idpersona=$fila[idpersona]";
	   				 	$resultado2 = mysql_query($query,$conexion);
	   				 	$fila2 = mysql_fetch_assoc($resultado2);
	   				 	?>
	    				
	   				 <tr>
	    				<td><?php echo $fila['idpersona']?></td>
	    				<td><?php echo strtoupper($fila2['nombreusuario']); ?></td>
	    				<td><?php echo $fila['apellido']." ". $fila['nombre'];?></td>
	    				<td><?php echo $fila['nombredocumento']?></td>
	    				<td><?php echo $fila['numerodocumento']?></td>
	    				<td><?php echo $fila['email']?></td>
						<td class="center">
							<a href="/tp3/admin/editar.php?id=<?php echo $fila['idpersona']?>" title="Editar"><img alt="Modificar" src="/tp3/includes/img/edit.png"></a>
							
							<a href="/tp3/admin/borrar.php?id=<?php echo $fila['idpersona']?>" title="Eliminar"><img alt="Eliminar" src="/tp3/includes/img/delete.png"></a>
						</td>
					</tr>
					<!--------------------------------------------------------------- -->
			
			
			 <?php } ?>
			
		</table>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>
