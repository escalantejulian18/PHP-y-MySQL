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

// Inicializamos la información de tipo documento
$oTipoDocumento = \Sgu\ActiveRecord\ActiveRecordFactory::getTipoDocumento();

// Inicializamos la información de tipo usuario
$oTipoUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getTipoUsuario();

// Verificamos si hay información personal en la sesión
if ( $oRegistry->exists('informacion_personal') == false )
{
	// Si no hay información en la sesión, inicializamos la información personal
	$oInformacionPersonal = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();
}
else
{
	$oInformacionPersonal = $oRegistry->get('informacion_personal');
	$oTipoDocumento->fetch($oInformacionPersonal->getIdTipoDocumento());
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
	$oTipoUsuario->fetch($oInformacionUsuario->getIdTipoUsuario());
}

// Verificamos que se haya enviado el formulario
if ( isset($_POST['bt_paso2']) == true )
{
	
	if (ctype_graph($_POST['email'])) {
		$clean['email'] = $_POST['email'];
	}

	if (ctype_digit($_POST['telefono'])) {
		$clean['telefono'] = $_POST['telefono'];
	}
	else {
		$clean['telefono'] = 'telefono no valido';
	}
	
	if (ctype_digit($_POST['celular'])) {
		$clean['celular'] = $_POST['celular'];	  
	}
	
	if (ctype_alnum($_POST['domicilio'])) {
		$clean['domicilio'] = $_POST['domicilio'];
	}
	
	$prov = array('Entre Rios','Santa Fe','Cordoba', 'Buenos Aires');
	if (in_array($_POST['provincia'], $prov)) {
		$clean['provincia'] = $_POST['provincia'];
	}
	
	if (ctype_alpha($_POST['localidad'])) {
		$clean['localidad'] = $_POST['localidad'];
	}
	
	
	
	// Obtenemos los valores enviados
	$oInformacionPersonal->setEmail(( isset($clean['email']) == true ) ? $clean['email'] : '');
	$oInformacionPersonal->setTelefono(( isset($clean['telefono']) == true ) ? $clean['telefono'] : '');
	$oInformacionPersonal->setCelular(( isset($clean['celular']) == true ) ? $clean['celular'] : '');
	$oInformacionPersonal->setDomicilio(( isset($clean['domicilio']) == true ) ? $clean['domicilio'] : '');
	$oInformacionPersonal->setProvincia(( isset($clean['provincia']) == true ) ? $clean['provincia'] : '');
	$oInformacionPersonal->setLocalidad(( isset($clean['localidad']) == true ) ? $clean['localidad'] : '');
	
	/*
	$oInformacionPersonal->setEmail(( isset($_POST['email']) == true ) ? $_POST['email'] : '');
	$oInformacionPersonal->setTelefono(( isset($_POST['telefono']) == true ) ? $_POST['telefono'] : '');
	$oInformacionPersonal->setCelular(( isset($_POST['celular']) == true ) ? $_POST['celular'] : '');
	$oInformacionPersonal->setDomicilio(( isset($_POST['domicilio']) == true ) ? $_POST['domicilio'] : '');
	$oInformacionPersonal->setProvincia(( isset($_POST['provincia']) == true ) ? $_POST['provincia'] : '');
	$oInformacionPersonal->setLocalidad(( isset($_POST['localidad']) == true ) ? $_POST['localidad'] : '');*/
	
	$oRegistry->add('informacion_personal', $oInformacionPersonal);
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
	
	<h2>Informaci&oacute;n de alta de usuario</h2>
	
	<div class="ultimo_paso">
		<form>
		
			<fieldset>
				<legend>Informaci&oacute;n Personal:</legend>
				<input type="hidden" name="token" value="<?php echo $token; ?>">
				<ul>
					<li><label>Nombre de Usuario:</label></li>
					<li><?php echo htmlentities($oInformacionUsuario->getNombre()); ?><br></li>
					
					<li><label>Contrase&ntilde;a:</label></li>
					<li><?php echo str_repeat('*', strlen($oInformacionUsuario->getContrasenia())); ?><br></li>
					
					<li><label>Apellido:</label></li>
					<li><?php echo htmlentities($oInformacionPersonal->getApellido()); ?></li>
					
					<li><label>Nombre:</label></li>
					<li><?php echo htmlentities($oInformacionPersonal->getNombre()); ?></li>
					
					<li><label>Tipo de Documento:</label></li>
					<li><?php echo htmlentities($oTipoDocumento->getNombre()); ?></li>
					
					<li><label>N&uacute;mero de Documento:</label></li>
					<li><?php echo htmlentities($oInformacionPersonal->getNumeroDocumento()); ?></li>
					
					<li><label>Sexo:</label></li>
					<li><?php echo htmlentities($oInformacionPersonal->getSexo()); ?></li>
					
					<li><label>Nacionalidad:</label></li>
					<li><?php echo htmlentities($oInformacionPersonal->getNacionalidad()); ?></li>
				</ul>
				
			</fieldset>
			
			<fieldset>
				<legend>Informaci&oacute;n de Contacto:</legend>
				
				<ul>
					<li><label>Correo electr&oacute;nico:</label></li>
					<li><?php echo htmlentities($oInformacionPersonal->getEmail()); ?></li>
					
					<li><label>Tel&eacute;fono:</label></li>
					<li><?php echo htmlentities($oInformacionPersonal->getTelefono()); ?></li>
					
					<li><label>Celular:</label></li>
					<li><?php echo htmlentities( $oInformacionPersonal->getCelular()); ?></li>
					
					<li><label>Domicilio:</label></li>
					<li><?php echo htmlentities($oInformacionPersonal->getDomicilio()); ?></li>
					
					<li><label>Provincia:</label></li>
					<li><?php echo htmlentities($oInformacionPersonal->getProvincia()); ?></li>
					
					<li><label>Localidad:</label></li>
					<li><?php echo htmlentities($oInformacionPersonal->getLocalidad()); ?></li>
				</ul>
				
			</fieldset>
			
			<fieldset>
			
				<div class="buttons">
					<input type="button" value="Guardar" onclick="document.location='Finalizar.php'" class="button" >
					<input type="button" value="Anterior" onclick="document.location='Paso2.php'" class="button" >
				</div>
				
			</fieldset>
		
		</form>
		
	</div>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/footer.php'; ?>
</body>
</html>