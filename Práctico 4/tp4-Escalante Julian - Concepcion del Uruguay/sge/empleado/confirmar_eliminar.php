<?php

// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';

// Creo el objeto para luego cargar los datos
$oEmpleado = new Empleado();

// Verifico que el id esté seteado
if ( isset( $_GET['id'] ) == false || $_GET['id'] < 1 )
{
	header("location: lista.php");
}

// Cargo la información del empleado

$Aux = $oEmpleado->buscar($_GET['id']);



// Verifico que exista el empleado
/*if ( $oEmpleado->getIdEmpleado() < 1 )
{
	header("location: lista.php");
}*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Eliminar Empleado</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="mensaje">
			<p>Está seguro que desea eliminar al empleado <?php echo $Aux->getApellido(); ?>, <?php echo $Aux->getNombre(); ?> con legajo N° <?php echo $Aux->getLegajo(); ?></p>
			<p><button type="button" onclick="document.location = 'eliminar.php?id=<?php echo $Aux->getIdEmpleado(); ?>'">Si</button> <button type="button" onclick="window.history.back();">No</button></p>
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>