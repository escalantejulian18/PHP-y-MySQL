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

// Creo el objeto para luego cargar los datos
$oOficina = new Oficina();
$oEquipo = new Equipo();

print_r($_POST);



// Verifico que el id esté seteado
/*if ( isset( $_POST['idOficina'] ) == false || $_POST['idOficina'] < 1 )
{
	header("location: lista.php");
}

// Verifico que el id esté seteado
if ( isset( $_POST['idEquipo'] ) == false || $_POST['idEquipo'] < 1 )
{
	header("location: lista.php");
}*/

// Cargo la información de la oficina
//$oOficina->buscar($_POST['idOficina']);

// Verifico que exista el equipo
/*if ( $oOficina->getIdOficina() < 1 )
{
	header("location: lista.php");
}*/

// Cargo la información del equipo
//$oEquipo->buscar($_POST['idEquipo']);

// Verifico que exista el equipo
/*if ( $oEquipo->getIdEquipo() < 1 )
{
	header("location: lista.php");
}*/

$oOficinaEquipo = new OficinaEquipo();
$hayError = !$oOficinaEquipo->insertar($_POST['idOficina'],$_POST['idEquipo']);
$mensaje='Se ha registrado la relacion';

// Si no hubo error, vuelvo a la lista
/*if ( $hayError == false )
{
	header("location: lista.php");
}*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Agregar Equipo</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="mensaje">
			<p><?php echo $mensaje; ?></p>
			<p><a href="lista.php"><button type="button">Volver</button></a></p>
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>