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

$hayError = false;

// Creo el objeto para luego eliminar el registro
$oOficinaEquipo = new OficinaEquipo();

// Verifico que el id esté seteado
if ( isset( $_GET['id'] ) == false || $_GET['id'] < 1 )
{
	header("location: lista.php");
}

// Cargo la información del registro
$oOficinaEquipo->buscar($_GET['id']);

// Verifico que exista el el registro
if ( $oOficinaEquipo->getIdOficinaEquipo() < 1 )
{
	header("location: lista.php");
}

$hayError = !$oOficinaEquipo->eliminar();

// Si no hubo error, vuelvo a la lista
if ( $hayError == false )
{
	header("location: lista.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Eliminar Equipo</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="mensaje">
			<p>Ha ocurrido un error al intentar eliminar el registro, por favor vuelva a intentarlo</p>
			<p><button type="button" onclick="window.history.back();">Volver</button></p>
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>