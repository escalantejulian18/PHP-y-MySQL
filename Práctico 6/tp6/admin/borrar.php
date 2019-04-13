<?php 

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

//generamos el id de session
if (!isset($_SESSION['initiated'])){

	session_regenerate_id();
	$_SESSION['initiated'] = true;
}

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Obtenemos la instancia del Registry
$oSesion = \Sgu\Singleton\Sesion::getInstance();

// Obtenemos el id del usuario
$idUsuario = $_GET['id'];

// Inicializamos las variables que contendran la información del usuario
$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();

// Obtenemos la información desde la base de datos
$oUsuario->fetch($idUsuario);

// Obtenemos el nombre del usuario en base a su id
$usuario = $oUsuario->getNombre();

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
	
	<form action="/tp6/admin/eliminar_usuario.php" method="get">
		
		<input type="hidden" name="id" value="<?php echo $idUsuario; ?>">
		
		<fieldset>
			<legend>Borrar Usuario</legend>
			
			<div class="center mensaje">
				<p>
					¿Est&aacute; seguro que desea eliminar el usuario "<?php echo htmlentities($usuario); ?>"?
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

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/footer.php'; ?>
</body>
</html>