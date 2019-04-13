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

// Creo el objeto para luego cargar los datos
$oOficina = new Oficina();
$oOE= new OficinaEquipo();

// Verifico que el id esté seteado
/*if ( isset( $_GET['id'] ) == false || $_GET['id'] < 1 )
{
	header("location: lista.php");
}*/

// Cargo la información del empleado


$aux = $oOficina->buscar($_GET['id']);                   
$aux->vector= $oOE->buscarPorIdOficina($_GET['id']);
print_r($aux);

// Verifico que exista la oficina
/*if ( $oOficina->getIdOficina() < 1 )
{
	header("location: lista.php");
}
*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Informaci&oacute;n de Oficina</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="formulario">
			
			<form action="/sge/equipo/guardar.php" method="post">
				
				<input type="hidden" name="idOficina" value="<?php echo $aux->getIdOficina(); ?>"/>
				
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" value="<?php echo $aux->getNombre(); ?>" placeholder="Ingrese nombre..."/>
				
				<div class="buttons">
					<button type="submit">Guardar</button>
					<button type="button" onclick="window.history.back();">Cancelar</button>
				</div>
				
			</form>
			
		</div>
		
		<h2>Equipos</h2>
		
		<table>
			
			<tr>
				<th>ID</th>
				<th>DESCRIPCION</th>
				<th>IP</th>
				<th>MAC</th>
				<th>EMPLEADO</th>
				<th colspan="2">&nbsp;</th>
			</tr>
			
			<?php if ( count( $oficina->getEquipos() ) == 0 ) { ?>
			
			<tr>
				<td colspan="6">No se han encontrado resultados</td>
			</tr>
			
			<?php } else { foreach ( $oficina->getEquipos() as $item ) { ?>
			<tr>
				
				<td><?php echo $item->getEquipo()->getIdEquipo(); ?></td>
				<td><?php echo $item->getEquipo()->getDescripcion(); ?></td>
				<td><?php echo $item->getEquipo()->getIp(); ?></td>
				<td><?php echo $item->getEquipo()->getMac(); ?></td>
				<td><?php echo $item->getEquipo()->getEmpleado()->getApellido() . ', ' . $item->getEquipo()->getEmpleado()->getNombre() . ' (L ' . $item->getEquipo()->getEmpleado()->getLegajo() . ')'; ?></td>
				<td><a class="icon ver" title="Ver/Editar" href="/sge/equipo/equipo.php?id=<?php echo $item->getEquipo()->getIdEquipo(); ?>"></a></td>
				<td><a class="icon eliminar" title="Eliminar" href="/sge/oficina/eliminar_equipo.php?id=<?php echo $item->getIdOficinaEquipo(); ?>"></a></td>
			
			</tr>
			<?php } } ?>
			
		</table>
		
		<div class="buttons">
			<button type="button" onclick="document.location = '/sge/oficina/seleccionar_equipo.php?id=<?php echo $oOficina->getIdOficina(); ?>'">Agregar Equipo</button>
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>