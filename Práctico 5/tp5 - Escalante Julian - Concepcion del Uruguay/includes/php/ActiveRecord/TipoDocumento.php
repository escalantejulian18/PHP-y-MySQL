<?php

namespace Sgu\ActiveRecord;

require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/ActiveRecord.php';

class TipoDocumento extends \Sgu\ActiveRecord\ActiveRecord{
	
	private $_idTipoDocumento;
	private $_nombre;
	private $_descipcion;
	
	public function setIdTipoDocumento($valor){
		
		$this->_idTipoDocumento;	
	}
	
	public function setNombre($valor){
		
		$this->_nombre;
	}
	
	public function setDescripcion($valor){
		
		$this->_descipcion;
	}
	
	public function getIdTipoDocumento(){
	
		return $this->_idTipoDocumento;
	}
	
	public function getNombre(){
	
		return 	$this->_nombre;
	}
	
	public function getDescripcion(){
	
		return $this->_descipcion;
	}
	
	
	public function insert(){
	
		$query="INSERT INTO `tipodocumento`(`nombre`, `descripcion`) 
		VALUES (
		$this->_nombre;
		$this->_descricion;
		";

	
		$result = mysql_query($query);
	
		if ($result == TRUE){
	
			$this->_idTipoDocumento=mysql_insert_id($conexion);
		}
	}
	
	
		public function update($id){
	
		$query="UPDATE `tipodocumento` SET
										  nombre='{$this->_nombre}',
										  descripcion={$this->_descipcion},
			WHERE idtipodocumento={$this->_idTipoDocumento}";

	
			$result = mysql_query($query);
		}
	
	
	
			public function delete($id){
	
			$query="DELETE from tipodocumento where idtipodocumento=$id";
	
			$result = mysql_query($query);
	
			}
	
			public function fetch($id){
	
			$query="SELECT * from tipodocumento where idtipodocumento= $id";
	
			$result = mysql_query($query);
	
			$fila = mysql_fetch_assoc($result);
	
			$this->_idTipoDocumento=$fila['idtipodocumento'];
			$this->_nombre=$fila['nombre'];
			$this->_descripcion=$fila['descripcion'];
						
			}
	
	
}