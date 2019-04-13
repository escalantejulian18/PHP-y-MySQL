<?php 

// Incluimos la clase de sesion


// Incluimos la clase Factory


// Obtenemos la instancia del Registry


// Inicializamos la información personal
$oInformacionPersonal = null;
$oTipoDocumento = null;

// Inicializamos la información de usuario
$oInformacionUsuario = null;
$oTipoUsuario = null;

// Obtenemos un objeto de tipo de documento


// Obtenemos un objeto de tipo de usuario



// Verificamos si hay información personal en la sesión
if ( $oRegistry->exists('informacion_personal') == false )
{
	// Si no hay información en la sesión, Obtenemos una instancia de la clase persona
}
else
{
	// Obtenemos el objeto con la información de la persona desde el registry
	
	// Obtenemos la información del tipo de documento
}

// Verificamos si hay información de usuario en la sesión
if ( $oRegistry->exists('informacion_usuario') == false )
{
	// Si no hay información en la sesión, obtenemos una instancia de la clase usuario
}
else
{
	// Obtenemos el objeto con la información de usuario desde el registry
	
	// Obtenemos la información del tipo de documento
	
}

// Verificamos que se haya enviado el formulario
if ( isset($_POST['bt_paso2']) == true )
{
	// Obtenemos los valores enviados
	$oInformacionPersonal->setEmail(( isset($_POST['email']) == true ) ? $_POST['email'] : '');
	$oInformacionPersonal->setTelefono(( isset($_POST['telefono']) == true ) ? $_POST['telefono'] : '');
	$oInformacionPersonal->setCelular(( isset($_POST['celular']) == true ) ? $_POST['celular'] : '');
	$oInformacionPersonal->setDomicilio(( isset($_POST['domicilio']) == true ) ? $_POST['domicilio'] : '');
	$oInformacionPersonal->setProvincia(( isset($_POST['provincia']) == true ) ? $_POST['provincia'] : '');
	$oInformacionPersonal->setLocalidad(( isset($_POST['localidad']) == true ) ? $_POST['localidad'] : '');
	
	$oRegistry->add('informacion_personal', $oInformacionPersonal);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Formulario de Inscripc&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp5/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/menu.php'; ?>
	
	<h2>Informaci&oacute;n de alta de usuario</h2>
	
	<div class="ultimo_paso">
		<form>
		
			<fieldset>
				<legend>Informaci&oacute;n Personal:</legend>
				
				<ul>
					<li><label>Nombre de Usuario:</label></li>
					<li><?php echo $oInformacionUsuario->getNombre(); ?><br></li>
					
					<li><label>Contrase&ntilde;a:</label></li>
					<li><?php echo str_repeat('*', strlen($oInformacionUsuario->getContrasenia())); ?><br></li>
					
					<li><label>Apellido:</label></li>
					<li><?php echo $oInformacionPersonal->getApellido(); ?></li>
					
					<li><label>Nombre:</label></li>
					<li><?php echo $oInformacionPersonal->getNombre(); ?></li>
					
					<li><label>Tipo de Documento:</label></li>
					<li><?php echo $oTipoDocumento->getNombre(); ?></li>
					
					<li><label>N&uacute;mero de Documento:</label></li>
					<li><?php echo $oInformacionPersonal->getNumeroDocumento(); ?></li>
					
					<li><label>Sexo:</label></li>
					<li><?php echo $oInformacionPersonal->getSexo(); ?></li>
					
					<li><label>Nacionalidad:</label></li>
					<li><?php echo $oInformacionPersonal->getNacionalidad(); ?></li>
				</ul>
				
			</fieldset>
			
			<fieldset>
				<legend>Informaci&oacute;n de Contacto:</legend>
				
				<ul>
					<li><label>Correo electr&oacute;nico:</label></li>
					<li><?php echo $oInformacionPersonal->getEmail(); ?></li>
					
					<li><label>Tel&eacute;fono:</label></li>
					<li><?php echo $oInformacionPersonal->getTelefono(); ?></li>
					
					<li><label>Celular:</label></li>
					<li><?php echo $oInformacionPersonal->getCelular(); ?></li>
					
					<li><label>Domicilio:</label></li>
					<li><?php echo $oInformacionPersonal->getDomicilio(); ?></li>
					
					<li><label>Provincia:</label></li>
					<li><?php echo $oInformacionPersonal->getProvincia(); ?></li>
					
					<li><label>Localidad:</label></li>
					<li><?php echo $oInformacionPersonal->getLocalidad(); ?></li>
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

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/footer.php'; ?>
</body>
</html>