<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Agregar Empleado</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="formulario">
			
			<form action="/sge/empleado/guardar.php" method="post">
				
				<label for="apellido">Apellido:</label>
				<input type="text" name="apellido" value="" placeholder="Ingrese el Apellido..."/>
				
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" value="" placeholder="Ingrese el Nombre..."/>
				
				<label for="legajo">Legajo:</label>
				<input type="text" name="legajo" value="" placeholder="Ingrese el N° de Legajo..."/>
				
				<div class="buttons">
					<button type="submit">Guardar</button>
					<button type="button" onclick="window.history.back();">Atras</button>
					<button type="reset">Vaciar</button>
				</div>
				
			</form>
			
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>