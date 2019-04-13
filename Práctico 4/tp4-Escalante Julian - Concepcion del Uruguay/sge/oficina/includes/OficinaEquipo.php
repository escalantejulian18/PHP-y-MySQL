<?php

class OficinaEquipo{

	public $idoficinaequipo; 
	public $idoficina;
	public $equipo;
	public $fecha;

	public function setIdOficinaEquipo($idoficinaequipo)
	{
		$this->idoficinaequipo=$idoficinaequipo;
	}
	
	public function setIdOficina($idoficina)
	{
		$this->idoficina=$idoficina;
	}
	
	public function setEquipo($equipo)
	{
		$this->equipo=$equipo;
	}
	
	public function setFecha($fecha)
	{
		$this->fecha;
	}
	
	public function getIdOficinaEquipo()
	{
		return $this->idoficinaequipo;
	}
	
	public function getIdOficina()
	{
		return $this->idoficina;
	}
	
	public function getEquipo()
	{
		return $this->equipo;
	}
	
	public function getFecha()
	{
		return $this->fecha;
	}

	public function getAll (){
	
		$conector = new BaseDeDatos();
	
		$consulta = "SELECT * FROM oficinaequipo";
	
		$result=$conector->query($consulta);
	
		$resultados = array();
	
		while ( ( $fila = $conector->fetchArray() ) != false ){
				
			$oOficinaequipo = new OficinaEquipo();
				
			$oOficinaequipo->setIdOficinaEquipo($fila['idoficinaequipo']);
			$oOficinaequipo->setEquipo($fila['idequipo']);
			$oOficinaequipo->setIdOficina($fila['idoficina']);
			$oOficinaequipo->setFecha($fila['fecha']);
			$resultados[]=$oOficinaequipo;
		}
	
		return $resultados;
	
	}
	
	/*public function buscarPorIdOficina($id){
	
		$conector = new BaseDeDatos();
	
		$consulta ="SELECT * FROM oficinaequipo WHERE idoficina=$id";
	
		$conector->query($consulta);
	
		$resultados = array();
		
		while ( ($fila = $conector->fetchArray()) !=false){ 
			$oOficinaEquipo = new OficinaEquipo();
			$oOficinaEquipo->setIdOficinaEquipo($fila['idoficinaequipo']);
			$oOficinaEquipo->setIdOficina($fila['idoficina']);
			$oOficinaEquipo->setEquipo($fila['idequipo']);
			$oOficinaEquipo->setFecha($fila['fecha']);
			$resultados=$oOficinaEquipo;
		}	
		print_r($resultados);
		return $resultados;
	}*/
	
	public function buscarPorIdOficina($id){
	
		$conector = new BaseDeDatos();
	
		$consulta ="SELECT * FROM oficinaequipo";
	
		$conector->query($consulta);
	
		$resultados = array();
	
		while ( ($fila = $conector->fetchArray()) !=false){
			$oOficinaEquipo = new OficinaEquipo();
			$oOficinaEquipo->setIdOficinaEquipo($fila['idoficinaequipo']);
			$oOficinaEquipo->setIdOficina($fila['idoficina']);
			$oOficinaEquipo->setEquipo($fila['idequipo']);
			$oOficinaEquipo->setFecha($fila['fecha']);
			
			If ($oOficinaEquipo->getIdOficina()==$id){
				$resultados[]=$oOficinaEquipo;
			}
		}
		
		return $resultados;
	}
	
	
	public function buscar($id){
	
	
		$conector = new BaseDeDatos();
	
		$consulta ="SELECT * FROM oficinaequipo WHERE idoficinaequipo=$id";
	
		$conector->query($consulta);
	
		$fila = $conector->fetchArray();
			
		$oOficinaEquipo = new OficinaEquipo();
		$oOficinaEquipo->setIdOficinaEquipo($fila['idoficinaequipo']);
		$oOficinaEquipo->setIdOficina($fila['idoficina']);
		$oOficinaEquipo->setEquipo($fila['idequipo']);
		$oOficinaEquipo->setFecha($fila['fecha']);
	
		$resultados=$oOficinaEquipo;
	
		return $resultados;
	}
	
	public function insertar($ido,$ide){
	
	
		$conector = new BaseDeDatos();

		$consulta ="INSERT INTO `oficinaequipo`( `idoficina`, `idequipo`) VALUES ($ido,$ide)";
	
		$conector->query($consulta);
	
	}
	
	
	
	
	public function eliminar($id){
	
		$conector = new BaseDeDatos();
	
		$consulta ="DELETE FROM oficinaequipo WHERE idoficinaequipo=$id";
	
		$conector->query($consulta);
	
	}
	
} 
?>