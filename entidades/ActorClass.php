<?php 
/**
*	Clase Actor
*	
*/
class Actor{

	// Atributos
	private $actorId;
	private $nombre;
	private $apellido;

	// Constructores
	function __construct(){
		$this->actorId 	= "";
		$this->nombre 	= "";
		$this->apellido = "";	
	} 

	// Accesadores
	public function getActorId() 	{ return $this->actorId; 	}
	public function getNombre()		{ return $this->nombre; 	}
	public function getApellido() 	{ return $this->apellido;	}

	// Mutadores
	public function setActorId($actorId) 	{ $this->actorId 	= $actorId;		}
	public function setNombre($nombre)		{ $this->nombre 	= $nombre;		}
	public function setApellido($apellido)	{ $this->apellido 	= $apellido;	}

} // end class
?>