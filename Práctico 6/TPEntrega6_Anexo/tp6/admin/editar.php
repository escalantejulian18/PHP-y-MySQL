<?php 

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/Singleton/Sesion.php';

// Incluimos la clase de singleton
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecordFactory.php';

// Obtenemos la instancia del Registry
$oRegistry = \Sgu\Singleton\Sesion::getInstance()->getRegistry();

// Obtenemos el id del usuario
$idUsuario = $_GET['id'];

// Inicializamos las variables que contendran la información del usuario
$oPersona = \Sgu\ActiveRecord\ActiveRecordFactory::getPersona();
$oUsuario = \Sgu\ActiveRecord\ActiveRecordFactory::getUsuario();

// Obtenemos la información desde la base de datos
$oUsuario->fetch($idUsuario);
$oPersona->fetch($oUsuario->getIdPersona());

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Editar Usuario</title>
	<link type="text/css" rel="stylesheet" href="/tp6/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/menu.php'; ?>
	
	<form action="editar_usuario.php" method="post">
		
		<input type="hidden" name="idUsuario" value="<?php echo $oUsuario->getIdUsuario(); ?>">
		
		<fieldset>
			<legend>Informaci&oacute;n Personal:</legend>
			
			<ul>
				<li><label>Nombre de Usuario:</label></li>
				<li><input type="text" name="nombre_usuario" value="<?php echo $oUsuario->getNombre(); ?>"></li>
				
				<li><label>Contrase&ntilde;a:</label></li>
				<li><input type="password" name="contrasenia" value="<?php echo $oUsuario->getContrasenia(); ?>"></li>
				
				<li><label>Tipo de Usuario:</label></li>
				<li>
					<select name="tipo_usuario">
						<option value="1" <?php echo ( $oUsuario->getIdTipoUsuario() == '1' ) ? 'selected="selected"' : '' ; ?>>Administrador</option>
						<option value="2" <?php echo ( $oUsuario->getIdTipoUsuario() == null || $oUsuario->getIdTipoUsuario() == '2' ) ? 'selected="selected"' : '' ; ?>>Normal</option>
					</select>
				</li>
				
				<li><label>Apellido:</label></li>
				<li><input type="text" name="apellido" value="<?php echo $oPersona->getApellido(); ?>"></li>
				
				<li><label>Nombre:</label></li>
				<li><input type="text" name="nombre" value="<?php echo $oPersona->getNombre(); ?>"></li>
				
				<li><label>Tipo de Documento:</label></li>
				<li>
					<select name="tipo_documento">
						<option value="1" <?php echo ( $oPersona->getIdTipoDocumento() == null || $oPersona->getIdTipoDocumento() == '1' ) ? 'selected="selected"' : '' ; ?>>DNI</option>
						<option value="2" <?php echo ( $oPersona->getIdTipoDocumento() == '2' ) ? 'selected="selected"' : '' ; ?>>LC</option>
						<option value="3" <?php echo ( $oPersona->getIdTipoDocumento() == '3' ) ? 'selected="selected"' : '' ; ?>>LE</option>
					</select>
				</li>
				
				<li><label>N&uacute;mero de Documento:</label></li>
				<li><input type="text" name="numero_documento" value="<?php echo $oPersona->getNumeroDocumento(); ?>"></li>
				
				<li><label>Sexo:</label></li>
				<li>
					<label class="radio"><input type="radio" name="sexo" value="M" <?php echo ( $oPersona->getSexo() == null || $oPersona->getSexo() == 'M' ) ? 'checked="checked"' : '' ; ?>> Masculino</label>
					<label class="radio"><input type="radio" name="sexo" value="F" <?php echo ( $oPersona->getSexo() == 'F' ) ? 'checked="checked"' : '' ; ?>> Femenino</label>
				</li>
				
				<li><label>Nacionalidad:</label></li>
				<li><input type="text" name="nacionalidad" value="<?php echo $oPersona->getNacionalidad(); ?>"></li>
			</ul>
			
		</fieldset>
		
		<fieldset>
			<legend>Informaci&oacute;n de Contacto:</legend>
			
			<ul>
				<li><label>Correo electr&oacute;nico:</label></li>
				<li><input type="text" name="email" value="<?php echo $oPersona->getEmail(); ?>"></li>
				
				<li><label>Tel&eacute;fono:</label></li>
				<li><input type="text" name="telefono" value="<?php echo $oPersona->getTelefono(); ?>"></li>
				
				<li><label>Celular:</label></li>
				<li><input type="text" name="celular" value="<?php echo $oPersona->getCelular(); ?>"></li>
				
				<li><label>Domicilio:</label></li>
				<li><input type="text" name="domicilio" value="<?php echo $oPersona->getDomicilio(); ?>"></li>
				
				<li><label>Provincia:</label></li>
				<li>
					<select name="provincia">
						<option value="Entre Rios" <?php echo ( $oPersona->getProvincia() == 'Entre Rios' ) ? 'selected="selected"' : '' ; ?>>Entre Rios</option>
						<option value="Santa Fe" <?php echo ( $oPersona->getProvincia() == 'Santa Fe' ) ? 'selected="selected"' : '' ; ?>>Santa Fe</option>
						<option value="Cordoba" <?php echo ( $oPersona->getProvincia() == 'Cordoba' ) ? 'selected="selected"' : '' ; ?>>Cordoba</option>
						<option value="Buenos Aires" <?php echo ( $oPersona->getProvincia() == 'Buenos Aires' ) ? 'selected="selected"' : '' ; ?>>Buenos Aires</option>
					</select>
				</li>
				
				<li><label>Localidad:</label></li>
				<li><input type="text" name="localidad" value="<?php echo $oPersona->getLocalidad(); ?>"></li>
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

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/footer.php'; ?>
</body>
</html>