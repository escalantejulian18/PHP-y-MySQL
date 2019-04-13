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
$oEmpleado->buscar($_GET['id']);

// Verifico que exista el empleado
if ( $oEmpleado->getIdEmpleado() < 1 )
{
	header("location: lista.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Informaci&oacute;n de Empleado</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="formulario">
			
			<form action="/sge/empleado/guardar.php" method="post">
				
				<input type="hidden" name="idEmpleado" value="<?php echo $oEmpleado->getIdEmpleado(); ?>"/>
				
				<label for="apellido">Apellido:</label>
				<input type="text" name="apellido" value="<?php echo $oEmpleado->getApellido(); ?>" placeholder="Ingrese el Apellido..."/>
				
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" value="<?php echo $oEmpleado->getNombre(); ?>" placeholder="Ingrese el Nombre..."/>
				
				<label for="legajo">Legajo:</label>
				<input type="text" name="legajo" value="<?php echo $oEmpleado->getLegajo()?>" placeholder="Ingrese el N° de Legajo..."/>
				
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