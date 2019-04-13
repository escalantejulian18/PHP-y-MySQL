<?php 

// Iniciamos o restauramos la sesión
session_start();

// Inicializamos la información personal
$informacionPersonal = null;

// Verificamos si hay información personal en la sesión
if ( isset($_SESSION['informacion_personal']) == false )
{
	// Si no hay información en la sesión, inicializamos las variables de la sesión
	$_SESSION['informacion_personal']['nombre_usuario'] = '';
	$_SESSION['informacion_personal']['contrasenia'] = '';
	$_SESSION['informacion_personal']['tipo_usuario'] = '';
	$_SESSION['informacion_personal']['apellido'] = '';
	$_SESSION['informacion_personal']['nombre'] = '';
	$_SESSION['informacion_personal']['tipo_documento'] = '';
	$_SESSION['informacion_personal']['numero_documento'] = '';
	$_SESSION['informacion_personal']['sexo'] = '';
	$_SESSION['informacion_personal']['nacionalidad'] = '';
}

// Obtenemos la información de la sesión
$informacionPersonal = $_SESSION['informacion_personal'];

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
	
	<form action="Paso2.php" method="post">
		<fieldset>
			<legend>Informaci&oacute;n Personal:</legend>
			
			<ul>
				<li><label>Nombre de Usuario:</label></li>
				<li><input type="text" name="nombre_usuario" value="<?php echo $informacionPersonal['nombre_usuario']; ?>"></li>
				
				<li><label>Contrase&ntilde;a:</label></li>
				<li><input type="password" name="contrasenia" value="<?php echo $informacionPersonal['contrasenia']; ?>"></li>
				
				<li><label>Tipo de Usuario:</label></li>
				<li>
					<select name="tipo_usuario" >
						<option value="1" <?php echo ( $informacionPersonal['tipo_usuario'] == '1' ) ? 'selected="selected"' : '' ; ?>>Administrador</option>
						<option value="2" <?php echo ( isset($informacionPersonal['tipo_usuario']) == false || $informacionPersonal['tipo_usuario'] == null || $informacionPersonal['tipo_usuario'] == '2' ) ? 'selected="selected"' : '' ; ?>>Normal</option>
					</select>
				</li>
				
				<li><label>Apellido:</label></li>
				<li><input type="text" name="apellido" value="<?php echo $informacionPersonal['apellido']; ?>"></li>
				
				<li><label>Nombre:</label></li>
				<li><input type="text" name="nombre" value="<?php echo $informacionPersonal['nombre']; ?>"></li>
				
				<li><label>Tipo de Documento:</label></li>
				<li>
					<select name="tipo_documento">
						<option value="1" <?php echo ( isset($informacionPersonal['tipo_documento']) == false || $informacionPersonal['tipo_documento'] == null || $informacionPersonal['tipo_documento'] == '1' ) ? 'selected="selected"' : '' ; ?>>DNI</option>
						<option value="2" <?php echo ( $informacionPersonal['tipo_documento'] == '2' ) ? 'selected="selected"' : '' ; ?>>LC</option>
						<option value="3" <?php echo ( $informacionPersonal['tipo_documento'] == '3' ) ? 'selected="selected"' : '' ; ?>>LE</option>
					</select>
				</li>
				
				<li><label>N&uacute;mero de Documento:</label></li>
				<li><input type="text" name="numero_documento" value="<?php echo $informacionPersonal['numero_documento']; ?>"></li>
				
				<li><label>Sexo:</label></li>
				<li>
					<label class="radio"><input type="radio" name="sexo" value="Masculino" <?php echo ( isset($informacionPersonal['sexo']) == false || $informacionPersonal['sexo'] == null || $informacionPersonal['sexo'] == 'M' ) ? 'checked="checked"' : '' ; ?>> Masculino</label>
					<label class="radio"><input type="radio" name="sexo" value="Femenino" <?php echo ( $informacionPersonal['sexo'] == 'F' ) ? 'checked="checked"' : '' ; ?>> Femenino</label>
				</li>
				
				<li><label>Nacionalidad:</label></li>
				<li><input type="text" name="nacionalidad" value="<?php echo $informacionPersonal['nacionalidad']; ?>"></li>
			</ul>
			
			<div class="buttons">
				<input type="submit" name="bt_paso1" class="button" value="Siguiente">
			</div>
		</fieldset>
	</form>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>
