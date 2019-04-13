<?php

namespace Sgu\ActiveRecord;

require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/ActiveRecord.php';

Class Usuario extends \Sgu\ActiveRecord\ActiveRecord{

	private $_idUsuario;
	private $_idTipoUsuario;
	private $_idPersona;
	private $_nombre;
	private $_contrasenia;

	public function setIdPersona($valor){

		$this->_idPersona=$valor;
	}

	public function getIdPersona(){

		return $this->_idPersona;
	}

	public function setIdUsuario($valor){

		$this->_idUsuario=$valor;
	}

	public function getIdUsuario(){

		return $this->_idUsuario;
	}

	public function setIdTipoUsuario($valor){

		$this->_idTipoUsuario=$valor;
	}

	public function getIdTipoUsuario(){

		return $this->_idTipoUsuario;
	}

	public function setNombre($valor){

		$this->_nombre=$valor;
	}

	public function getNombre(){

		return $this->_nombre;
	}

	public function setContrasenia($valor){

		$this->_contrasenia=$valor;
	}

	public function getContrasenia(){

		return $this->_contrasenia;
	}

	public function insert(){
	
		
		$query="INSERT INTO `usuario`(
									  `idtipousuario`, 
									  `idpersona`, 
									  `nombre`, 
									  `contrasenia`) 
			    VALUES (
			           	 {$this->_idTipoUsuario},
			           	 {$this->_idPersona},
						'{$this->_nombre}',
						'{$this->_contrasenia}' )";
						
		//$conexion = \Sgu\Singleton\BasedeDatos::getInstance()->getConexion();

		$result = mysql_query($query, $this->_conexion);
		
	}


		public function update($id){
			
			$query="UPDATE `usuario` SET 
										 idtipousuario={$this->_idTipoUsuario},
										 idpersona={$this->_idPersona},
										 nombre='{$this->_nombre}',
										 contrasenia='{$this->_contrasenia}' 
					WHERE idusuario=$id";

			$result = mysql_query($query, $this->_conexion);
			var_dump($result);
		}



		public function delete($id){

				$query="DELETE from usuario where idusuario=$id";
					
				$result = mysql_query($query,$this->_conexion);

		}

   	   public function fetch($id){

			$query="SELECT * from usuario where idusuario= $id";

			$result = mysql_query($query, $this->_conexion);

			$fila = mysql_fetch_assoc($result);

			$this->_idUsuario=$fila['idusuario'];
			$this->_idPersona=$fila['idpersona'];
			$this->_nombre=$fila['nombre'];
			$this->_contrasenia=$fila['contrasenia'];
			
			return $this;
		}
				
		public function buscarPorUsuarioContrasenia($usuario, $contrasenia){
			
			$query = "select * from usuario where nombre = '$usuario' and contrasenia = '$contrasenia'";
		
			$resultado = mysql_query($query, $this->_conexion);
		
			if ( $resultado != false && ($fila = mysql_fetch_assoc($resultado)) != false )
			{
				$this->_idUsuario = $fila['idusuario'];
				$this->_idTipoUsuario = $fila['idtipousuario'];
				$this->_idPersona = $fila['idpersona'];
				$this->_nombre = $fila['nombre'];
				$this->_contrasenia = $fila['contrasenia'];
					
				return true;
			}
		
			return false;
		}
			

			
		public function buscarPorIdPersona($id){
			
				$query = "select * from usuario where idpersona = $id";
			
				$resultado = mysql_query($query, $this->_conexion);
			
				$fila = mysql_fetch_assoc($resultado);
			
				$this->_idUsuario = $fila['idusuario'];
				$this->_idTipoUsuario = $fila['idtipousuario'];
				$this->_idPersona = $fila['idpersona'];
				$this->_nombre = $fila['nombre'];
				$this->_contrasenia = $fila['contrasenia'];
			}
	}
