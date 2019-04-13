<?php

// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';

// Creo el objeto para luego obtener todos los empleados
$oEmpleado = new Empleado();

// Obtengo el array con todos los objetos de empleado

$aItems = $oEmpleado->getAll();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Lista de Empleados</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="buttons">
			<button type="button" onclick="document.location = '/sge/empleado/agregar.php'">Agregar Empleado</button>
		</div>
		
		<table>
			
			<tr>
				<th>ID</th>
				<th>APELLIDO</th>
				<th>NOMBRE</th>
				<th>LEGAJO</th>
				<th colspan="2">&nbsp;</th>
			</tr>
			
			<?php if ( count( $aItems ) == 0 ) { ?>
			
			<tr>
				<td colspan="6">No se han encontrado resultados</td>
			</tr>
			
			<?php } 
					else { foreach ( $aItems as $item) { ?>
			<tr>
				
				<td><?php echo $item->getIdEmpleado();?></td>
				<td><?php echo $item->getApellido(); ?></td>
				<td><?php echo $item->getNombre(); ?></td>
				<td><?php echo $item->getLegajo(); ?></td>
				<td><a class="icon ver" title="Ver/Editar" href="/sge/empleado/editar.php?id=<?php echo $item->getIdEmpleado();?>"></a></td>
				<td><a class="icon eliminar" title="Eliminar" href="/sge/empleado/confirmar_eliminar.php?id=<?php echo $item->getIdEmpleado(); ?>"></a></td>
			
			</tr>
			<?php } } ?>
			
		</table>
		
		<div class="buttons">
			<button type="button" onclick="document.location = '/sge/aplicaciones'">Aplicaciones</button>
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>