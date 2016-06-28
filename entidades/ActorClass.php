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

	// Accesadores
	public function getActorId() 	{ return $this->actor_id; 	}
	public function getNombre()		{ return $this->nombre; 	}
	public function getApellido() 	{ return $this->apellido;	}

	// Mutadores
	public function setActorId($actorId) 	{ $this->actor_id 	= $actorId;		}
	public function setNombre($nombre)		{ $this->nombre 	= $nombre;		}
	public function setApellido($apellido)	{ $this->apellido 	= $apellido;	}

} // end class
?>