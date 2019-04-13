<?php 

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

//generamos el id de session
if (!isset($_SESSION['initiated'])){

	session_regenerate_id();
	$_SESSION['initiated'] = true;
}

// Generamos el token
if (isset($_POST['message'])){
	if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']){
		$message = htmlentities($_POST['message']);
		$fp = fopen('./messages.txt', 'a');
		fwrite($fp, "$message<br />");
		fclose($fp);
	}
}

$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;

// Obtenemos la instancia del Registry
$oRegistry = \Sgu\Singleton\Sesion::getInstance();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Borrar Usuario</title>
	<link type="text/css" rel="stylesheet" href="/tp6/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/menu.php'; ?>
	
	<form action="/tp6/admin/buscar.php" method="get">
		
		<fieldset>
			<legend>Borrar Usuario</legend>
			<input type="hidden" name="token" value="<?php echo $token; ?>">
			<ul>
				<li><label>N&uacute;mero de Documento:</label></li>
				<li>
					<input type="text" name="numero_documento">
					<input type="submit" value="Borrar" class="button">
				</li>
			</ul>
			
		</fieldset>
	
	</form>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/footer.php'; ?>
</body>
</html>