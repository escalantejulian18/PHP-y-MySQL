<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/tp3/Includes/PHP/Conexion.php';

if (isset($_GET['id'])==true){
	
	
	$conexion = conectarBD();
	$idpersona = $_GET['id'];
	
	$query="select * from persona where idpersona = $idpersona";
	$resultado=mysql_query($query,$conexion);
	$fila = mysql_fetch_assoc($resultado);
	
	$query="select * from usuario where idpersona = $idpersona";
	$resultado2=mysql_query($query,$conexion);
	$fila2=mysql_fetch_assoc($resultado2);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Borrar Usuario</title>
	<link type="text/css" rel="stylesheet" href="/tp3/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/menu.php'; ?>
	
	<form action="/tp3/admin/eliminar_usuario.php" method="get">
		
		<input type="hidden" name="id" value="<?php echo $idpersona; ?>">
		
		<fieldset>
			<legend>Borrar Usuario</legend>
			
			<div class="center mensaje">
				<p>
					¿Est&aacute; seguro que desea eliminar el usuario "<?php echo $fila2['nombreusuario']; ?>"?
				</p>
				<p>
					<input type="submit" value="Si" class="button">
					<input type="button" value="No" class="button" onclick="history.back();">
				</p>
			</div>
			
		</fieldset>
	
	</form>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>
<?php }?>