<?php 

// Iniciamos o restauramos la sesión
session_start();

// Obtenemos el id del usuario
$idUsuario = $_GET['id'];

// Inicializamos las variables que contendran la información del usuario
$informacionPersonal = null;
$informacionContacto = null;


// Obtenemos la información desde la base de datos

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Editar Usuario</title>
	<link type="text/css" rel="stylesheet" href="/tp3/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/menu.php'; ?>
	
	<form action="editar_usuario.php" method="post">
		
		<input type="hidden" name="idUsuario" value="<?php echo $informacionPersonal['id_usuario']; ?>">
		
		<fieldset>
			<legend>Informaci&oacute;n Personal:</legend>
			
			<ul>
				<li><label>Nombre de Usuario:</label></li>
				<li><input type="text" name="nombre_usuario" value="<?php echo $informacionPersonal['nombre_usuario']; ?>"></li>
				
				<li><label>Contrase&ntilde;a:</label></li>
				<li><input type="password" name="contrasenia" value="<?php echo $informacionPersonal['contrasenia']; ?>"></li>
				
				<li><label>Tipo de Usuario:</label></li>
				<li>
					<select name="tipo_usuario">
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
					<label class="radio"><input type="radio" name="sexo" value="M" <?php echo ( isset($informacionPersonal['sexo']) == false || $informacionPersonal['sexo'] == null || $informacionPersonal['sexo'] == 'M' ) ? 'checked="checked"' : '' ; ?>> Masculino</label>
					<label class="radio"><input type="radio" name="sexo" value="F" <?php echo ( $informacionPersonal['sexo'] == 'F' ) ? 'checked="checked"' : '' ; ?>> Femenino</label>
				</li>
				
				<li><label>Nacionalidad:</label></li>
				<li><input type="text" name="nacionalidad" value="<?php echo $informacionPersonal['nacionalidad']; ?>"></li>
			</ul>
			
		</fieldset>
		
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
			
		</fieldset>
		
		<fieldset>
			
			<div class="buttons">
				<input type="submit" value="Guardar" class="button" >
			</div>
			
		</fieldset>
		
	</form>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>