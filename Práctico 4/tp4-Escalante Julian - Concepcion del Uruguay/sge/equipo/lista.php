<?php

// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';

// Incluyo la clase de equipo
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/equipo/includes/Equipo.php';

// Creo el objeto para luego obtener todos los equipos
$oEquipo = new Equipo();

// Obtengo el array con todos los objetos de equipo
$aItems = $oEquipo->getAll();

$oEmpleado = new Empleado();



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Lista de Equipos</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="buttons">
			<button type="button" onclick="document.location = '/sge/equipo/agregar.php'">Agregar Equipo</button>
		</div>
		
		<table>
			
			<tr>
				<th>ID</th>
				<th>DESCRIPCION</th>
				<th>IP</th>
				<th>MAC</th>
				<th>EMPLEADO</th>
				<th colspan="2">&nbsp;</th>
			</tr>
			
			<?php if ( count( $aItems ) == 0 ) { ?>
			
			<tr>
				<td colspan="6">No se han encontrado resultados</td>
			</tr>
			
			<?php } else { foreach ( $aItems as $item ) { ?>
			<tr>
				
				<td><?php echo $item->getIdEquipo(); ?></td>
				<td><?php echo $item->getDescripcion(); ?></td>
				<td><?php echo $item->getIp(); ?></td>
				<td><?php echo $item->getMac(); ?></td>
				<td><?php //echo $item->getEmpleado()->getApellido() . ', ' . $item->getEmpleado()->getNombre() . ' (L ' . $item->getEmpleado()->getLegajo() . ')'; 
						  $Aux=$oEmpleado->buscar($item->getEmpleado());
						  echo $Aux->apellido.' , '.$Aux->nombre.' , '.$Aux->legajo?></td>
				<td><a class="icon ver" title="Ver/Editar" href="/sge/equipo/editar.php?id=<?php echo $item->getIdEquipo(); ?>"></a></td>
				<td><a class="icon eliminar" title="Eliminar" href="/sge/equipo/confirmar_eliminar.php?id=<?php echo $item->getIdEquipo(); ?>"></a></td>
			
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