<?php 

// Iniciamos o restauramos la sesión
session_start();

// Inicializamos la información de contacto
$informacionContacto = null;

// Verificamos que se haya enviado el formulario
if ( isset($_POST['bt_paso1']) == true )
{
	$_SESSION['informacion_personal']['nombre_usuario'] = ( isset($_POST['nombre_usuario']) == true ) ? $_POST['nombre_usuario'] : '';
	$_SESSION['informacion_personal']['contrasenia'] = ( isset($_POST['contrasenia']) == true ) ? $_POST['contrasenia'] : '';
	$_SESSION['informacion_personal']['tipo_usuario'] = ( isset($_POST['tipo_usuario']) == true ) ? $_POST['tipo_usuario'] : '';
	$_SESSION['informacion_personal']['apellido'] = ( isset($_POST['apellido']) == true ) ? $_POST['apellido'] : '';
	$_SESSION['informacion_personal']['nombre'] = ( isset($_POST['nombre']) == true ) ? $_POST['nombre'] : '';
	$_SESSION['informacion_personal']['tipo_documento'] = ( isset($_POST['tipo_documento']) == true ) ? $_POST['tipo_documento'] : '';
	$_SESSION['informacion_personal']['numero_documento'] = ( isset($_POST['numero_documento']) == true ) ? $_POST['numero_documento'] : '';
	$_SESSION['informacion_personal']['sexo'] = ( isset($_POST['sexo']) == true ) ? $_POST['sexo'] : '';
	$_SESSION['informacion_personal']['nacionalidad'] = ( isset($_POST['nacionalidad']) == true ) ? $_POST['nacionalidad'] : '';
}

// Verificamos si hay información de contacto en la sesión
if ( isset($_SESSION['informacion_contacto']) == false )
{
	// Si no hay información en la sesión, inicializamos las variables en la sesión
	$_SESSION['informacion_contacto']['email'] = '';
	$_SESSION['informacion_contacto']['telefono'] = '';
	$_SESSION['informacion_contacto']['celular'] = '';
	$_SESSION['informacion_contacto']['domicilio'] = '';
	$_SESSION['informacion_contacto']['provincia'] = '';
	$_SESSION['informacion_contacto']['localidad'] = '';
}

// Obtenemos la información de la sesión
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
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/header_registro.php'; ?>
	
	<form action="Paso3.php" method="post">
		<fieldset>
			<legend>Informaci&oacute;n de Contacto:</legend>
			
			<ul>
				<li><label>Correo electr&oacute;nico:</label></li>
				<li><input type="text" name="email" value="<?php echo $informacionContacto['email']; ?>"></li>
				
				<li><label>Tel&eacute;fono:</label></li>
				<li><input type="text" name="telefono" value="<?php echo $informacionContacto['telefono']; ?>"></li>
				
				<li><label>Celular:</label></li>
				<li><input type="text" name="celular" value="<?php echo $informacionContacto['celular']; ?>"></li>
				
				<li><label>Domicilio:</label></li>
				<li><input type="text" name="domicilio" value="<?php echo $informacionContacto['domicilio']; ?>"></li>
				
				<li><label>Provincia:</label></li>
				<li>
					<select name="provincia">
						<option value="Entre Rios" <?php echo ( $informacionContacto['provincia'] == 'Entre Rios' ) ? 'selected="selected"' : '' ; ?>>Entre Rios</option>
						<option value="Santa Fe" <?php echo ( $informacionContacto['provincia'] == 'Santa Fe' ) ? 'selected="selected"' : '' ; ?>>Santa Fe</option>
						<option value="Cordoba" <?php echo ( $informacionContacto['provincia'] == 'Cordoba' ) ? 'selected="selected"' : '' ; ?>>Cordoba</option>
						<option value="Buenos Aires" <?php echo ( $informacionContacto['provincia'] == 'Buenos Aires' ) ? 'selected="selected"' : '' ; ?>>Buenos Aires</option>
					</select>
				</li>
				
				<li><label>Localidad:</label></li>
				<li><input type="text" name="localidad" value="<?php echo $informacionContacto['localidad']; ?>"></li>
			</ul>
			
			<div class="buttons">
				<input type="submit" name="bt_paso2" value="Siguiente" class="button" >
				<input type="button" value="Anterior" onclick="document.location='Paso1.php'" class="button" >
			</div>
		</fieldset>
	</form>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>
