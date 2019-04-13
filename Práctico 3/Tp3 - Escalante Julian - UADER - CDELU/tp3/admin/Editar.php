<?php 

// Iniciamos o restauramos la sesión
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/tp3/Includes/PHP/Conexion.php';

if (isset($_GET['id'])==true){

	
	$conexion = conectarBD();

		
	$idpersona = $_GET['id'];
	
	$query="select * from usuario where idpersona = $idpersona";
	$resultado=mysql_query($query,$conexion);
	$filaU=mysql_fetch_assoc($resultado);   //obtengo la fila del usuario y contraseña

	$query="select * from persona where idpersona = $idpersona";
	$resultado=mysql_query($query,$conexion);
	$fila = mysql_fetch_assoc($resultado); //obtengo la fila con informacion de usuario
}

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
		
		<input type="hidden" name="idpersona" value="<?php echo $idpersona; ?>">
		
		<fieldset>
			<legend>Informaci&oacute;n Personal:</legend>
			
			<ul>
				<li><label>Nombre de Usuario:</label></li>
				<li><input type="text" name="nombre_usuario" value="<?php echo  $filaU['nombreusuario']?>"></li>
				
				<li><label>Contrase&ntilde;a:</label></li>
				<li><input type="password" name="contrasenia" value="<?php echo $filaU['contrasenia']?>"></li>
				
				<li><label>Tipo de Usuario:</label></li>
				<li>
					<select name="tipo_usuario">
						<option value="1" <?php echo ($filaU['idtipousuario'] == 1) ? 'selected' : '' ?>>Administrador</option>
						<option value="2" <?php echo ($filaU['idtipousuario'] == 2) ? 'selected' : '' ?>>Normal</option>
					</select>
				</li>
				
				<li><label>Apellido:</label></li>
				<li><input type="text" name="apellido" value="<?php echo $fila['apellido'] ?>"></li>
				
				<li><label>Nombre:</label></li>
				<li><input type="text" name="nombre" value="<?php echo $fila['nombre'] ?>"></li>
				
				<li><label>Tipo de Documento:</label></li>
				<li>
					<select name="tipo_documento">
						<option value="1" <?php echo ($fila['idtipodocumento'] == 1) ?'selected' : '' ;?>>DNI</option>
						<option value="2" <?php echo ($fila['idtipodocumento'] == 2) ?'selected' : '' ;?>>LC</option>
						<option value="3" <?php echo ($fila['idtipodocumento'] == 3) ?'selected' : '' ;?>>LE</option>
					</select>
				</li>
				
				<li><label>N&uacute;mero de Documento:</label></li>
				<li><input type="text" name="numero_documento" value="<?php echo $fila['numerodocumento'] ?>"></li>
				
				<li><label>Sexo:</label></li>
				<li>
					<label class="radio"><input type="radio" name="sexo" value="M" <?php echo ($fila['sexo'] == 'M') ? 'checked' : '' ; ?>> Masculino</label>
					<label class="radio"><input type="radio" name="sexo" value="F" <?php echo ($fila['sexo'] == 'F') ? 'checked' : '' ; ?>> Femenino</label>
				</li>
				
				<li><label>Nacionalidad:</label></li>
				<li><input type="text" name="nacionalidad" value="<?php echo $fila['nacionalidad'] ?>"></li>
			</ul>
			
		</fieldset>
		
		<fieldset>
			<legend>Informaci&oacute;n de Contacto:</legend>
			
			<ul>
				<li><label>Correo electr&oacute;nico:</label></li>
				<li><input type="text" name="email" value="<?php echo $fila['email']; ?>"></li>
				
				<li><label>Tel&eacute;fono:</label></li>
				<li><input type="text" name="telefono" value="<?php echo $fila['telefono']; ?>"></li>
				
				<li><label>Celular:</label></li>
				<li><input type="text" name="celular" value="<?php echo $fila['celular']; ?>"></li>
				
				<li><label>Provincia:</label></li>
				<li>
					<select name="provincia">
						<option value="Entre Rios" <?php echo ($fila['provincia'] == "Entre Rios") ? 'selected' : '' ;?> >Entre Rios</option>
						<option value="Santa Fe"   <?php echo ($fila['provincia'] == "Santa Fe") ? 'selected' : '' ;?> >Santa Fe</option>
						<option value="Cordoba"    <?php echo ($fila['provincia'] == "Cordoba") ? 'selected' : '' ;?>>Cordoba</option>
						<option value="Buenos Aires"  <?php echo ($fila['provincia'] == "Buenos Aires") ? 'selected' : '' ;?>>Buenos Aires</option>
					</select>
				</li>
				
				<li><label>Localidad:</label></li>
				<li><input type="text" name="localidad" value="<?php echo $fila['localidad']; ?>"></li>
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