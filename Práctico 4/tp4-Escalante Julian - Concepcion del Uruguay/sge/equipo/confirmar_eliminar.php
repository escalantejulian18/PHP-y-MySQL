<?php

// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';

// Incluyo la clase de equipo
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/equipo/includes/Equipo.php';

// Creo el objeto para luego cargar los datos
$oEquipo = new Equipo();

// Verifico que el id esté seteado
if ( isset( $_GET['id'] ) == false || $_GET['id'] < 1 )
{
	header("location: lista.php");
}

// Cargo la información del equipo
$aux = $oEquipo->buscar($_GET['id']);

// Verifico que exista el equipo
/*if ( $oEquipo->getIdEquipo() < 1 )
{
	header("location: lista.php");
}*/

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
			<p>Está seguro que desea eliminar el equipo <?php echo $aux->getDescripcion(); ?> con direcci&oacute;n MAC <?php echo $aux->getMac(); ?></p>
			<p><button type="button" onclick="document.location = 'eliminar.php?id=<?php echo $aux->getIdEquipo(); ?>'">Si</button> <button type="button" onclick="window.history.back();">No</button></p>
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>