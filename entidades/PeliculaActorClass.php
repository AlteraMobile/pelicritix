<?php 
/**
*	Clase Pelicula Actor
*	
*/
class PeliculaActor{

	// Atributos
	private $peliculaId;
	private $actorId;

	// Constructores
	function __construct(){
		$this->peliculaId 	= "";
		$this->actorId 		= "";	
	}

	// Accesadores
	public function getPeliculaId() 	{ return $this->peliculaId; 	}
	public function getActorId()		{ return $this->actorId; 	}

	// Mutadores
	public function setPeliculaId($peliculaId) 	{ $this->peliculaId 	= $peliculaId;	}
	public function setActorId($actorId)		{ $this->actorId 		= $actorId;		}

} // end class
?>