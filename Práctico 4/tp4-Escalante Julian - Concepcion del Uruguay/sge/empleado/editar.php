<?php 
// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';


$oEmpleado = new Empleado();

if (isset($_GET['id'])==true){
	
	$aux = $oEmpleado->buscar($_GET['id']);

}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Editar Empleado</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	
	
	<div class="main">
		
		<div class="formulario">
			
			<form action="/sge/empleado/guardar.php" method="post">
				
				<input type="hidden" name="idEmpleado" value="<?php echo $aux->idempleado; ?>" >
				
				<label for="apellido">Apellido:</label>
				<input type="text" name="apellido" value="<?php echo $aux->apellido; ?>" />
				
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" value="<?php echo $aux->nombre; ?>" />
				
				<label for="legajo">Legajo:</label>
				<input type="text" name="legajo" value="<?php echo $aux->legajo?>" />
				
				
				<div class="buttons">
					<button type="submit">Guardar</button>
					<button type="button" onclick="window.history.back();">Atras</button>
				</div>
				
			</form>
			
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>