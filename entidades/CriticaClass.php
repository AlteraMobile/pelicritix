<?php 
/**
*	Clase Critica
*	
*/
class Critica{

	// Atributos
	private $criticaId;
	private $comentario;
	private $fechaCritica;
	private $peliculaId;
	private $usuarioId;

	// Constructores
	function __construct(){
		$this->criticaId 	= "";
		$this->comentario 	= "";
		$this->fechaCritica = "";
		$this->peliculaId 	= "";
		$this->usuarioId 	= "";
	}

	// Accesadores
	public function getCriticaId()		{ return $this->criticaId;		}
	public function getComentario()		{ return $this->comentario;		}
	public function getFechaCritica()	{ return $this->fechaCritica;	}
	public function getUsuarioId()		{ return $this->usuarioId;		}
	public function getPeliculaId()		{ return $this->peliculaId;		}

	// Mutadores
	public function setCriticaId($criticaId)		{	$this->criticaId = $criticaId;			}
	public function setComentario($comentario)		{	$this->comentario = $comentario;		}
	public function setFechaCritica($fechaCritica)	{	$this->fechaCritica = $fechaCritica;	}
	public function setUsuarioId($usuarioId)		{	$this->usuarioId = $usuarioId;			}
	public function setPeliculaId($peliculaId)		{	$this->peliculaId = $peliculaId;		}

} // end Class
?>