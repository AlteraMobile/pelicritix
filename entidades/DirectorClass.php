<?php 
/**
*	Clase Director
*	
*/
class Director{
	
	// Atributos
	private $directorId;
	private $nombre;
	private $apellido;

	// Construcotres
	function __construct(){
		$this->directorId = "";
		$this->nombre = "";
		$this->apellido = "";
	}
	
	// Accesadores
	public function getDirectorId(){
		return $this->directorId;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getApellido(){
		return $this->apellido;
	}

	// Mutadores
	public function setDirectorId($directorId){
		$this->directorId = $directorId;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

} // end Class
?>