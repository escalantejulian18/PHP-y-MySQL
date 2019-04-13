<?php

namespace Sgu\ActiveRecord;

require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/ActiveRecord/ActiveRecord.php';

class TipoUsuario extends \Sgu\ActiveRecord\ActiveRecord{

	private $_idTipoUsuario;
	private $_nombre;
	private $_descipcion;

	public function setIdTipoUsuario($valor){

		$this->_idTipoUsuario;
	}

	public function setNombre($valor){

		$this->_nombre;
	}

	public function setDescripcion($valor){

		$this->_descipcion;
	}

	public function getIdTipoUsuario(){

		return $this->_idTipoUsuario;
	}

	public function getNombre(){

		return 	$this->_nombre;
	}

	public function getDescripcion(){

		return $this->_descipcion;
	}


	public function insert(){

		$query="INSERT INTO `tipousuario`(`nombre`, `descripcion`)
		VALUES (
		$this->_nombre;
		$this->_descricion;
		";



		$result = mysql_query($query);

		if ($result == TRUE){

			$this->_idTipoUsuario=mysql_insert_id($conexion);
		}
	}


	public function update($id){

			$query="UPDATE `tipousuario` SET
										nombre='{$this->_nombre}',
										descripcion={$this->_descipcion},
			WHERE idtipousuario={$this->_idTipoUsuario}";

	

			$result = mysql_query($query);
	}



	public function delete($id){

			$query="DELETE from tipousuario where idtipousuario=$id";



			$result = mysql_query($query);

			}

	public function fetch($id){

			$query="SELECT * from tipousuario where idtipousuario= $id";



			$result = mysql_query($query);

			$fila = mysql_fetch_assoc($result);

			$this->_idTipoUsuario=$fila['idtipousuario'];
			$this->_nombre=$fila['nombre'];
			$this->_descripcion=$fila['descripcion'];
	}
}
