<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/oficina/includes/Oficina.php';


$oOficina = new Oficina();

if (isset($_GET['id'])==true){

	$aux= $oOficina->buscar($_GET['id']);
}




?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Agregar Oficina</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="formulario">
			
			<form action="/sge/oficina/guardar.php" method="post">
				
				<input type="hidden" name="idOficina" value="<?php echo $aux->idoficina?>">
				
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" value="<?php echo $aux->nombre;?>" />
				
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