<?php 

// Incluimos la clase de sesion
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

// Incluimos la clase Factory
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Obtenemos la instancia del Registry
$oRegistry = \Sgu\Singleton\Sesion::getInstance()->getRegistry();

// Inicializamos la información personal
$oInformacionPersonal = null;

// Inicializamos la información de usuario
$oInformacionUsuario = null;

// Verificamos si hay información personal en la sesión
if ( $oRegistry->exists('informacion_personal') == false )
{
	// Si no hay información en la sesión, inicializamos la información personal
	$oInformacionPersonal = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();
}
else
{
	$oInformacionPersonal = $oRegistry->get('informacion_personal');
}

// Verificamos si hay información de usuario en la sesión
if ( $oRegistry->exists('informacion_usuario') == false )
{
	// Si no hay información en la sesión, inicializamos la información de usuario
	$oInformacionUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();
}
else
{
	$oInformacionUsuario = $oRegistry->get('informacion_usuario');
}

// Verificamos que se haya enviado el formulario
if ( isset($_POST['bt_paso1']) == true )
{
	$clean = array();
	
	if (ctype_alnum($_POST['nombre_usuario'])) {
		$clean['nombre_usuario'] = $_POST['nombre_usuario'];
	}
	
	if (ctype_alnum($_POST['contrasenia'])) {
		$clean['contrasenia'] = $_POST['contrasenia'];
	}
	
	if (ctype_digit($_POST['tipo_usuario'])) {
		$clean['tipo_usuario'] = $_POST['tipo_usuario'];
	}
	
	if (ctype_alpha($_POST['apellido'])) {
		$clean['apellido'] = $_POST['apellido'];
	}
	
	
	if (ctype_alpha($_POST['nombre'])) {
		$clean['nombre'] = $_POST['nombre'];
	}
	
	if (ctype_digit($_POST['tipo_documento'])) {
		$clean['tipo_documento'] = $_POST['tipo_documento'];
	}
	
	if (ctype_digit($_POST['numero_documento'])) {
		$clean['numero_documento'] = $_POST['numero_documento'];
	}
	
	$genero = array('M','F');
	if (in_array($_POST['sexo'], $genero)) {
		$clean['sexo'] = $_POST['sexo'];
	}
	
	if (ctype_alpha($_POST['nacionalidad'])) {
		$clean['nacionalidad'] = $_POST['nacionalidad'];
	}
	
	$oInformacionUsuario->setNombre(( isset($clean['nombre_usuario']) == true ) ? $clean['nombre_usuario'] : '');
	$oInformacionUsuario->setContrasenia(( isset($clean['contrasenia']) == true ) ? $clean['contrasenia'] : '');
	$oInformacionUsuario->setIdTipoUsuario(( isset($clean['tipo_usuario']) == true ) ? $clean['tipo_usuario'] : '');
	$oInformacionPersonal->setApellido(( isset($clean['apellido']) == true ) ? $clean['apellido'] : '');
	$oInformacionPersonal->setNombre(( isset($clean['nombre']) == true ) ? $clean['nombre'] : '');
	$oInformacionPersonal->setIdTipoDocumento(( isset($clean['tipo_documento']) == true ) ? $clean['tipo_documento'] : '');
	$oInformacionPersonal->setNumeroDocumento(( isset($clean['numero_documento']) == true ) ? $clean['numero_documento'] : '');
	$oInformacionPersonal->setSexo(( isset($clean['sexo']) == true ) ? $clean['sexo'] : '');
	$oInformacionPersonal->setNacionalidad(( isset($clean['nacionalidad']) == true ) ? $clean['nacionalidad'] : '');
	
	/*
	$oInformacionUsuario->setNombre(( isset($_POST['nombre_usuario']) == true ) ? $_POST['nombre_usuario'] : '');
	$oInformacionUsuario->setContrasenia(( isset($_POST['contrasenia']) == true ) ? $_POST['contrasenia'] : '');
	$oInformacionUsuario->setIdTipoUsuario(( isset($_POST['tipo_usuario']) == true ) ? $_POST['tipo_usuario'] : '');
	$oInformacionPersonal->setApellido(( isset($_POST['apellido']) == true ) ? $_POST['apellido'] : '');
	$oInformacionPersonal->setNombre(( isset($_POST['nombre']) == true ) ? $_POST['nombre'] : '');
	$oInformacionPersonal->setIdTipoDocumento(( isset($_POST['tipo_documento']) == true ) ? $_POST['tipo_documento'] : '');
	$oInformacionPersonal->setNumeroDocumento(( isset($_POST['numero_documento']) == true ) ? $_POST['numero_documento'] : '');
	$oInformacionPersonal->setSexo(( isset($_POST['sexo']) == true ) ? $_POST['sexo'] : '');
	$oInformacionPersonal->setNacionalidad(( isset($_POST['nacionalidad']) == true ) ? $_POST['nacionalidad'] : '');*/
	
	$oRegistry->add('informacion_personal', $oInformacionPersonal);
	$oRegistry->add('informacion_usuario', $oInformacionUsuario);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Formulario de Inscripc&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp6/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/menu.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/header_registro.php'; ?>
	
	<form action="Paso3.php" method="post">
		<fieldset>
			<legend>Informaci&oacute;n de Contacto:</legend>
			<input type="hidden" name="token" value="<?php echo $token; ?>">
			<ul>
				<li><label>Correo electr&oacute;nico:</label></li>
				<li><input type="text" name="email" value="<?php echo $oInformacionPersonal->getEmail(); ?>"></li>
				
				<li><label>Tel&eacute;fono:</label></li>
				<li><input type="text" name="telefono" value="<?php echo $oInformacionPersonal->getTelefono(); ?>"></li>
				
				<li><label>Celular:</label></li>
				<li><input type="text" name="celular" value="<?php echo $oInformacionPersonal->getCelular(); ?>"></li>
				
				<li><label>Domicilio:</label></li>
				<li><input type="text" name="domicilio" value="<?php echo $oInformacionPersonal->getDomicilio(); ?>"></li>
				
				<li><label>Provincia:</label></li>
				<li>
					<select name="provincia">
						<option value="Entre Rios" <?php echo ( $oInformacionPersonal->getProvincia() == 'Entre Rios' ) ? 'selected="selected"' : '' ; ?>>Entre Rios</option>
						<option value="Santa Fe" <?php echo ( $oInformacionPersonal->getProvincia() == 'Santa Fe' ) ? 'selected="selected"' : '' ; ?>>Santa Fe</option>
						<option value="Cordoba" <?php echo ( $oInformacionPersonal->getProvincia() == 'Cordoba' ) ? 'selected="selected"' : '' ; ?>>Cordoba</option>
						<option value="Buenos Aires" <?php echo ( $oInformacionPersonal->getProvincia() == 'Buenos Aires' ) ? 'selected="selected"' : '' ; ?>>Buenos Aires</option>
					</select>
				</li>
				
				<li><label>Localidad:</label></li>
				<li><input type="text" name="localidad" value="<?php echo $oInformacionPersonal->getLocalidad(); ?>"></li>
			</ul>
			
			<div class="buttons">
				<input type="submit" name="bt_paso2" value="Siguiente" class="button" >
				<input type="button" value="Anterior" onclick="document.location='Paso1.php'" class="button" >
			</div>
		</fieldset>
	</form>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/footer.php'; ?>
</body>
</html>