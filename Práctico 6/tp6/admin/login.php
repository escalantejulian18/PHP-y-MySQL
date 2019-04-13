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
$oRegistry = \Sgu\Singleton\Sesion::getInstance()->getRegistry();

// Verificamos si hay un usuario logueado
if ( $oRegistry->exists('usuario_logueado') == true && $oRegistry->get('usuario_logueado') == true )
{
	// Si lo hay, lo redireccionamos al menú
	header('location: /tp6/admin/menu.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Iniciar Sesi&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp6/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/header.php'; ?>
	<hr>
	
	<form action="/tp6/admin/iniciar_sesion.php" method="post">
		<fieldset>
			<legend>Iniciar Sesi&oacute;n:</legend>
			<input type="hidden" name="token" value="<?php echo $token; ?>">
			<ul>
				<li><label>Usuario:</label></li>
				<li><input type="text" name="nombre_usuario" value=""></li>
				
				<li><label>Contrase&ntilde;a:</label></li>
				<li><input type="password" name="contrasenia" value=""></li>
				
				<li>&nbsp;</li>
				<li>
					<input type="submit" value="Iniciar Sesi&oacute;n" class="button">
					<input type="button" value="Cancelar" onclick="document.location='/tp6/'" class="button">
				</li>
				
			</ul>
			
		</fieldset>
	</form>
	
	<div class="push"></div>
	
</div>

<?php 

$_SESSION['HUA'] = md5($_SERVER['HTTP_USER_AGENT']);

require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/footer.php'; ?>
</body>
</html>