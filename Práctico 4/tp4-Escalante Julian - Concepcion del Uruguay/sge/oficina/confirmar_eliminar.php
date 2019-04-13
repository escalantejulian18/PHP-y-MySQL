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
if ( isset( $_GET['id'] ) == false || $_GET['id'] < 1 )
{
	header("location: lista.php");
}

// Cargo la información de la oficina
 $aux=$oOficina->buscar($_GET['id']);

// Verifico que exista la oficina
/*if ( $oOficina->getIdOficina() < 1 )
{
	header("location: lista.php");
}*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Eliminar Oficina</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="mensaje">
			<p>Está seguro que desea eliminar la oficina <?php echo '"'.$aux->getNombreOficina().'"'; ?></p>
			<p><button type="button" onclick="document.location = 'eliminar.php?id=<?php echo $aux->getIdOficina(); ?>'">Si</button> <button type="button" onclick="window.history.back();">No</button></p>
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>