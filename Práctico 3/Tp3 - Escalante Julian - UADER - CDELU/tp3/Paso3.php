<?php 

// Iniciamos o restauramos la sesión
session_start();

// Inicializamos la información de contacto
$informacionContacto = null;

// Verificamos que se haya enviado el formulario
if ( isset($_POST['bt_paso2']) == true )
{
	// Obtenemos los valores enviados
	$_SESSION['informacion_contacto']['email'] = ( isset($_POST['email']) == true ) ? $_POST['email'] : '';
	$_SESSION['informacion_contacto']['telefono'] = ( isset($_POST['telefono']) == true ) ? $_POST['telefono'] : '';
	$_SESSION['informacion_contacto']['celular'] = ( isset($_POST['celular']) == true ) ? $_POST['celular'] : '';
	$_SESSION['informacion_contacto']['domicilio'] = ( isset($_POST['domicilio']) == true ) ? $_POST['domicilio'] : '';
	$_SESSION['informacion_contacto']['provincia'] = ( isset($_POST['provincia']) == true ) ? $_POST['provincia'] : '';
	$_SESSION['informacion_contacto']['localidad'] = ( isset($_POST['localidad']) == true ) ? $_POST['localidad'] : '';
}

// Obtenemos la información de la sesión
$informacionPersonal = $_SESSION['informacion_personal'];
$informacionContacto = $_SESSION['informacion_contacto'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Formulario de Inscripc&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp3/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/menu.php'; ?>
	
	<h2>Informaci&oacute;n de alta de usuario</h2>
	
	<div class="ultimo_paso">
		<form>
		
			<fieldset>
				<legend>Informaci&oacute;n Personal:</legend>
				
				<ul>
					<li><label>Nombre de Usuario:</label></li>
					<li><?php echo $informacionPersonal['nombre_usuario']; ?><br></li>
					
					<li><label>Contrase&ntilde;a:</label></li>
					<li><?php echo str_repeat('*', strlen($informacionPersonal['contrasenia'])); ?><br></li>
					
					<li><label>Apellido:</label></li>
					<li><?php echo $informacionPersonal['apellido']; ?></li>
					
					<li><label>Nombre:</label></li>
					<li><?php echo $informacionPersonal['nombre']; ?></li>
					
					<li><label>Tipo de Documento:</label></li>
					<li><?php echo $informacionPersonal['tipo_documento']; ?></li>
					
					<li><label>N&uacute;mero de Documento:</label></li>
					<li><?php echo $informacionPersonal['numero_documento']; ?></li>
					
					<li><label>Sexo:</label></li>
					<li><?php echo $informacionPersonal['sexo']; ?></li>
					
					<li><label>Nacionalidad:</label></li>
					<li><?php echo $informacionPersonal['nacionalidad']; ?></li>
				</ul>
				
			</fieldset>
			
			<fieldset>
				<legend>Informaci&oacute;n de Contacto:</legend>
				
				<ul>
					<li><label>Correo electr&oacute;nico:</label></li>
					<li><?php echo $informacionContacto['email']; ?></li>
					
					<li><label>Tel&eacute;fono:</label></li>
					<li><?php echo $informacionContacto['telefono']; ?></li>
					
					<li><label>Celular:</label></li>
					<li><?php echo $informacionContacto['celular']; ?></li>
					
					<li><label>Domicilio:</label></li>
					<li><?php echo $informacionContacto['domicilio']; ?></li>
					
					<li><label>Provincia:</label></li>
					<li><?php echo $informacionContacto['provincia']; ?></li>
					
					<li><label>Localidad:</label></li>
					<li><?php echo $informacionContacto['localidad']; ?></li>
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

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>