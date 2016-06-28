<?php 
/**
*	Clase Pelicula Categoría
*	
*/
class PeliculaCategoria{

	// Atributos
	private $peliculaId;
	private $categoriaId;

	// Constructores
	function __construct(){
		$this->peliculaId 	= "";
		$this->categoriaId 	= "";	
	}

	// Accesadores
	public function getPeliculaId() 	{ return $this->peliculaId; 	}
	public function getCategoriaId()	{ return $this->categoriaId; 	}

	// Mutadores
	public function setPeliculaId($peliculaId) 	{ $this->peliculaId 	= $peliculaId;	}
	public function setCategoriaId($categoriaId)	{ $this->categoriaId 	= $categoriaId;	}

} // end class
?>