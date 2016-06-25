<?php 
/**
*	Clase Actor
*	
*/
class Actor{

	// Atributos
	private $actor_id;
	private $nombre;
	private $apellido;

	// Constructores
	function __construct(){
		$this->nombre 	= "";
		$this->apellido = "";	
	} 
	function __construct($nombre, $apellido){
		$this->nombre 	= $nombre;
		$this->apellido = $apellido;
	}

	// Accesadores
	public function getActorId(){
		return $this->actor_id;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getApellido(){
		return $this->apellido;
	}

	// Mutadores
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

} // end class
?>