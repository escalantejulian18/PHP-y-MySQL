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

// Verifico que el id esté seteado
/*if ( isset( $_GET['id'] ) == false || $_GET['id'] < 1 )
{
	header("location: lista.php");
}*/

// Cargo la información de la oficina
$oOficina->buscar($_GET['id']);

// Verifico que exista el empleado
/*if ( $oOficina->getIdOficina() < 1 )
{
	header("location: lista.php");
}*/

// Creo el objeto para luego obtener todos los equipos
$oEquipo = new Equipo();

// Obtengo el array con todos los objetos de equipo
$aItems = $oEquipo->getAll();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Seleccionar Equipo</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="formulario">
			Seleccione un equipo:<br /><br /><br />
			<form action="/sge/oficina/agregar_equipo.php" method="post">
				
				<input type="hidden" name="idOficina" value="<?php echo $oOficina->getIdOficina(); ?>" />
				
				<?php foreach ( $aItems as $item ) { ?>
				
				<input type="radio" id="equipo<?php echo $item->getIdEquipo(); ?>" name="idEquipo" value="<?php echo $item->getIdEquipo(); ?>" />
				<label for="equipo<?php echo $item->getIdEquipo(); ?>"><?php echo $item->getDescripcion();?></label><br />
				
				<?php } ?>
				
				<div class="buttons">
					<button type="submit">Guardar</button>
					<button type="button" onclick="window.history.back();">Cancelar</button>
				</div>
				
			</form>
			
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>