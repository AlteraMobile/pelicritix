<?php 
/**
*	Clase Director
*	
*/
class Director{
	
	// Atributos
	private $director_id;
	private $nombre;
	private $apellido;

	// Construcotres
	function __construct(){
		$this->nombre = "";
		$this->apellido = "";
	}
	function __construct($nombre, $apellido){
		$this->nombre 	= $nombre;
		$this->apellido = $apellido;
	}

	// Accesadores
	public function getDirectorId(){
		return $this->director_id;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getApellido(){
		return $this->nombre;
	}

	// Mutadores
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

} // end Class
?>