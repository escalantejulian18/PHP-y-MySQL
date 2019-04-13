<?php

namespace  Sgu\ActiveRecord;

require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/ActiveRecord.php';

class Persona extends \Sgu\ActiveRecord\ActiveRecord{
	
	private $_idPersona;
	private $_idTipoDocumento;
	private $_apellido;
	private $_nombre;
	private $_numeroDocumento;
	private $_sexo;
	private $_nacionalidad;
	private $_email;
	private $_telefono;
	private $_celular;
	private $_domilicio;
	private $_provincia;
	private $_localidad;

	
	public function setIdPersona($valor){
		
		$this->_idPersona=$valor;
	}
	
	public function getIdPersona(){
		
		return $this->_idPersona;
	}
	
	public function setIdTipoDocumento($valor){
	
		$this->_idTipoDocumento=$valor;
	}
	
	public function getIdTipoDocumento(){
	
		return $this->_idTipoDocumento;
	}
	
	public function setApellido($valor){
	
		$this->_apellido=$valor;
	}
	
	public function getApellido(){
	
		return $this->_apellido;
	}
	
	public function setNombre($valor){
	
		$this->_nombre=$valor;
	}
	
	public function getNombre(){
	
		return $this->_nombre;
	}
	
	public function setNumeroDocumento($valor){
	
		$this->_numeroDocumento=$valor;
	}
	
	public function getNumeroDocumento(){
	
		return $this->_numeroDocumento;
	}
	
	public function setSexo($valor){
	
		$this->_sexo=$valor;
	}
	
	public function getSexo(){
	
		return $this->_sexo;
	}
	
	public function setNacionalidad($valor){
	
		$this->_nacionalidad=$valor;
	}
	
	public function getNacionalidad(){
	
		return $this->_nacionalidad;
	}
	
	public function setEmail($valor){
	
		$this->_email=$valor;
	}
	
	public function getEmail(){
	
		return $this->_email;
	}
	
	public function setTelefono($valor){
	
		$this->_telefono=$valor;
	}
	
	public function getTelefono(){
	
		return $this->_telefono;
	}
	
	public function setCelular($valor){
	
		$this->_celular=$valor;
	}
	
	public function getCelular(){
	
		return $this->_celular;
	}
	
	public function setDomicilio($valor){
	
		$this->_domilicio=$valor;
	}
	
	public function getDomicilio(){
	
		return $this->_domilicio;
	}
	
	public function setProvincia($valor){
	
		$this->_provincia=$valor;
	}
	
	public function getProvincia(){
	
		return $this->_provincia;
	}
	
	public function setLocalidad($valor){
	
		$this->_localidad=$valor;
	}
	
	public function getLocalidad(){
	
		return $this->_localidad;
	}
	
	
	public function insert(){
			
			
			$query="INSERT INTO persona(idtipodocumento, apellido, nombre, 
			numerodocumento, sexo, nacionalidad, email, telefono, celular, 
			domicilio, provincia, localidad) 
			VALUES (
			{$this->_idTipoDocumento},
			'{$this->_apellido}',
			'{$this->_nombre}',
			{$this->_numeroDocumento},
			'{$this->_sexo}',
			'{$this->_nacionalidad}',
			'{$this->_email}',
			'{$this->_telefono}',
			'{$this->_celular}',
			'{$this->_domilicio}',
			'{$this->_provincia}',
			'{$this->_localidad}'
			)";
			
			//$conexion = \Sgu\Singleton\BasedeDatos::getInstance()->getConexion();
	
			$result = mysql_query($query,$this->_conexion);
	
		
	}	
	
		
    public function update($id){
    	
	$query="UPDATE `persona` SET
									idtipodocumento={$this->_idTipoDocumento},
									apellido='{$this->_apellido}',
									nombre='{$this->_nombre}',
									numerodocumento={$this->_numeroDocumento},
									sexo='{$this->_sexo}',
									nacionalidad='{$this->_nacionalidad}',
									email='{$this->_email}',
									telefono='{$this->_telefono}',
									celular='{$this->_celular}',
									domicilio='{$this->_domilicio}',
									provincia='{$this->_provincia}',
									localidad='{$this->_localidad}' 
				WHERE idpersona=$id";
		
		$resul=mysql_query($query, $this->_conexion);
		var_dump($resul);
	}
	
	
	
	public function delete($id){
	
			$query="DELETE from persona where idpersona=$id";
	
			$result = mysql_query($query, $this->_conexion);
	
	}
	
	public function fetch($id){
	
			$query="SELECT * from persona where idpersona= $id";
	
			$result = mysql_query($query, $this->_conexion);
	
			$fila = mysql_fetch_assoc($result);
	
			  $this->_idTipoDocumento=$fila['idtipodocumento'];
			  $this->_apellido=$fila['apellido'];
			  $this->_nombre=$fila['nombre'];
			  $this->_numeroDocumento=$fila['numerodocumento'];
			  $this->_sexo=$fila['sexo'];
			  $this->_nacionalidad=$fila['nacionalidad'];
			  $this->_email=$fila['email'];
			  $this->_telefono=$fila['telefono'];
			  $this->_celular=$fila['celular'];
			  $this->_domilicio=$fila['domicilio'];
			  $this->_provincia=$fila['provincia'];
			  $this->_localidad=$fila['localidad']; 
			  
			return $this;
	}
	
			
	public function buscarPorNumeroDocumento($numeroDocumento){
		
		$query = "select * from persona where numerodocumento = $numeroDocumento";
		
		$resultado = mysql_query($query, $this->_conexion);
		
		$fila = mysql_fetch_assoc($resultado);
		
		$this->_idPersona = $fila['idpersona'];
		$this->_idTipoDocumento = $fila['idtipodocumento'];
		$this->_apellido = $fila['apellido'];
		$this->_nombre = $fila['nombre'];
		$this->_numeroDocumento = $fila['numerodocumento'];
		$this->_sexo = $fila['sexo'];
		$this->_nacionalidad = $fila['nacionalidad'];
		$this->_email = $fila['email'];
		$this->_telefono = $fila['telefono'];
		$this->_celular = $fila['celular'];
		$this->_domicilio = $fila['domicilio'];
		$this->_provincia = $fila['provincia'];
		$this->_localidad = $fila['localidad'];
	}
			
	
}