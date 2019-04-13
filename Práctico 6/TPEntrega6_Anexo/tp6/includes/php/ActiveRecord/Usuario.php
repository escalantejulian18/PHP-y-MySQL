<?php

namespace Sgu\ActiveRecord;

// Incluimos la clase de active record base
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecord.php';

/**
 * Clase que administra los tipos de usuarios
 * 
 * @author totote
 * @package \Sgu\ActiveRecord
 */
class Usuario extends \Sgu\ActiveRecord\ActiveRecord
{
	private $_idUsuario;
	private $_idTipoUsuario;
	private $_idPersona;
	private $_nombre;
	private $_contrasenia;
	
	public function setIdUsuario($valor)
	{
		$this->_idUsuario = $valor;
	}
	
	public function getIdUsuario()
	{
		return $this->_idUsuario;
	}
	
	public function setIdTipoUsuario($valor)
	{
		$this->_idTipoUsuario = $valor;
	}
	
	public function getIdTipoUsuario()
	{
		return $this->_idTipoUsuario;
	}
	
	public function setIdPersona($valor)
	{
		$this->_idPersona = $valor;
	}
	
	public function getIdPersona()
	{
		return $this->_idPersona;
	}
	
	public function setNombre($valor)
	{
		$this->_nombre = $valor;
	}
	
	public function getNombre()
	{
		return $this->_nombre;
	}
	
	public function setContrasenia($valor)
	{
		$this->_contrasenia = $valor;
	}
	
	public function getContrasenia()
	{
		return $this->_contrasenia;
	}
	
	public function insert()
	{
		$query = "insert into usuario (idtipousuario, idpersona, nombre, contrasenia) values({$this->_idTipoUsuario},{$this->_idPersona},'{$this->_nombre}','{$this->_contrasenia}')";
		
		mysql_query($query, $this->_conexion);
		
		if ( mysql_errno($this->_conexion) != 0 )
		{
			throw new \Exception(mysql_error($this->_conexion));
		}
		
		$this->_idUsuario = mysql_insert_id($this->_conexion);
	}
	
	public function update($id)
	{
		$query = "update usuario set idtipousuario = {$this->_idTipoUsuario}, idpersona = {$this->_idPersona}, nombre = '{$this->_nombre}', contrasenia = '{$this->_contrasenia}' where idusuario = $id";
		
		mysql_query($query, $this->_conexion);
	}
	
	public function delete($id)
	{
		$query = "delete from usuario where idusuario = $id";
		
		mysql_query($query, $this->_conexion);
	}
	
	public function fetch($id)
	{
		$query = "select * from usuario where idusuario = $id";
		
		$resultado = mysql_query($query, $this->_conexion);
		
		$fila = mysql_fetch_assoc($resultado);
		
		$this->_idUsuario = $fila['idusuario'];
		$this->_idTipoUsuario = $fila['idtipousuario'];
		$this->_idPersona = $fila['idpersona'];
		$this->_nombre = $fila['nombre'];
		$this->_contrasenia = $fila['contrasenia'];
	}
	
	public function buscarPorUsuarioContrasenia($usuario, $contrasenia)
	{
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
	
	public function buscarPorIdPersona($id)
	{
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