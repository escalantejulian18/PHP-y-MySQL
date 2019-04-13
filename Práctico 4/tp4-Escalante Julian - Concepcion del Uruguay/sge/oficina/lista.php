<?php

// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';

// Incluyo la clase de equipo
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/equipo/includes/Equipo.php';

// Incluyo la clase de oficinaequipo
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/oficina/includes/OficinaEquipo.php';

// Incluyo la clase de oficina
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/oficina/includes/Oficina.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/oficina/includes/OficinaEquipo.php';

// Creo el objeto para luego obtener todos los equipos
$oOficina = new Oficina();
$oOficinaEquipo = new OficinaEquipo();

// Obtengo el array con todos los objetos de oficina
$aItems = $oOficina->getAll();




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Lista de Oficinas</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="buttons">
			<button type="button" onclick="document.location = '/sge/oficina/agregar.php'">Agregar Oficina</button> 
			<a href="template.php"><button type="button" >Vinculos</button></a> </div>
		
		<table>
			
			<tr>
				<th>ID</th>
				<th>NOMBRE</th>
				<th>EQUIPOS</th>
				<th colspan="2">&nbsp;</th>
			</tr>
			
			<?php if ( count( $aItems ) == 0 ) { ?>
			
			<tr>
				<td colspan="6">No se han encontrado resultados</td>
			</tr>
			
			<?php } else { foreach ( $aItems as $item ) { ?>
			<tr>
				
				<td><?php echo $item->getIdOficina(); ?></td>
				<td><?php echo $item->getNombreOficina(); ?></td>
				<td><?php echo 'cantidad de equipos: '.$item->getCantidadEquipos($item->getIdOficina());?></td>
				<td><a class="icon ver" title="Ver/Editar" href="/sge/oficina/editar.php?id=<?php echo $item->getIdOficina(); ?>"></a></td>
				<td><a class="icon eliminar" title="Eliminar" href="/sge/oficina/confirmar_eliminar.php?id=<?php echo $item->getIdOficina(); ?>"></a></td>
			
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