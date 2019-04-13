<?php 

session_start();


if (isset($_POST['btSiguiente'])==true){
	$_SESSION['usuario'] = $_POST['txtUsuario'];
	$_SESSION['contraseña'] = $_POST['Contraseña'];
	$_SESSION['apellido'] = $_POST['txtApellido'];
	$_SESSION['nombre'] = $_POST['txtNombre'];
	$_SESSION['tipoDocumento'] = $_POST['TipoDocumento'];
	$_SESSION['documento'] = $_POST['txtDocumento'];
	$_SESSION['sexo'] = $_POST['rdSexo'];
	$_SESSION['nacionalidad'] = $_POST['txtNacionalidad'];
	
}

$correo = '';
$telefono = '';
$domicilio = '';
$celular='';
$provincia='';
$localidad='';
		
if ( isset($_SESSION['corre']) ){
	$correo = $_SESSION['correo'];
}

if ( isset($_SESSION['telefono']) )
{
	$telefono = $_SESSION['telefono'];
}

if ( isset($_SESSION['domicilio']) )
{
	$domicilio = $_SESSION['domicilio'];
}		

if ( isset($_SESSION['celular']) )
{
	$celular = $_SESSION['celular'];
}

if ( isset($_SESSION['provincia']) )
{
	$provincia = $_SESSION['provincia'];
}

if ( isset($_SESSION['localidad']) )
{
	$localidad = $_SESSION['localidad'];
}

		
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>paso2</title>
</head>
<body>

<?php 
     require_once'Includes/php/cabecera.php';
?>

<form action="Paso3.php"  method="post">

<fieldset>

		<legend>Informacion Personal</legend>


		    <p>
			<label>Domicilio: </label>
			<input type="text" name=txtDomicilio placeholder="Domicilio" value="<?php echo $domicilio; ?>">
			</p>
			
			<p>
			<label>Teléfono: </label>
			<input type="text" name=txtTelefono placeholder="Telefono" value="<?php echo $telefono; ?>">
			</p>
	
			<p>
			<label>Celular: </label>
			<input type="text" name=txtCelular placeholder="Celular" value="<?php echo $celular; ?>">
			</p>
			
			<p>
			<label>Correo: </label>
			<input type="text" name=txtCorreo placeholder="Correo" value="<?php echo $correo; ?>">
			</p>
			
			<p>
			<label>Provincia: </label>
			<select name="Provincia">
			<option value="Buenos Aires"selected>Buenos Aires</option>
			<option value="Capital Federal">CapitalFederal</option>
			<option value="Catamarca">Catamarca</option>
			<option value="Cordoba">Cordoba</option>
			<option value="Corrientes" >Corrientes</option>
			<option value="Chaco" >Chaco</option>
			<option value="Chubut" >Chubut</option>
			<option value="Entre Ríos" >Entre Ríos</option>
			<option value="Formosa" >Formosa</option>
			<option value="Jujuy" >Jujuy</option>
			<option value="La Pampa" >La Pampa</option>
			<option value="La Rioja" >La Rioja</option>
			<option value="Mendoza" >Mendoza</option>
			<option value="Misiones" >Misiones</option>
			<option value="Neuquen" >Neuquen</option>
			<option value="Rio Negro" >Río Negro</option>
			<option value="Salta" >Santa</option>
			<option value="San Juan" >San Juan</option>
			<option value="San Luis">San Luis</option>
			<option value="Santa Cruz">Santa Cruz</option>
			<option value="Santa fe" >Santa Fe</option>
			<option value="Santiago del Estero" >Santiago del Estero</option>
			<option value="Tierra del Fuego" >Tierra del Fuego</option>
			<option value="Túcuman" >Túcuman</option>
			</select>
			</p>
			
			<p>
			<label>Localidad: </label>
			<input type="text" name=txtLocalidad placeholder="Localidad" value="<?php echo $localidad; ?>">
			</p>	

</fieldset>

<p> <input type="submit" name="btSiguiente" value="Siguiente"> </p>
</form>

<p><a href='Paso1.php'><input type="submit" name="btatras" value="Atrás"></a></p>

<?php 
     require_once'Includes/php/pie.php';
?>

 

</body>
</html>