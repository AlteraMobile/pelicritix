<?php 
/**
*	Clase Pelicula
*	
*/
class Pelicula{

	// Atributos
	private $peliculaId;
	private $titulo;
	private $subtitulo;
	private $fechaEstreno;
	private $anoProduccion;
	private $duracion;
	private $nota;
	private $color;
	private $loMejor;
	private $loPeor;
	private $imgPortada;
	private $urlTrailer;
	private $generoId;
	private $directorId;

	// Cosntructores
	function __construct(){
		$this->peliculaId 		="";
		$this->titulo 			= "";
		$this->subtitulo 		= "";
		$this->fechaEstreno 	= "";
		$this->anoProduccion 	= "";
		$this->duracion 		= "";
		$this->nota 			= "";
		$this->color 			= "";
		$this->loMejor 			= "";
		$this->loPeor 			= "";
		$this->imgPortada 		= "";
		$this->urlTrailer 		= "";
		$this->generoId 		= "";
		$this->directorId 		= "";
	}
	
	// Accesadores
	public function getPeliculaId()		{	return $this->peliculaId;		}
	public function getTitulo()			{	return $this->titulo;			}
	public function getSubtitulo()		{	return $this->subtitulo;		}
	public function getFechaEstreno()	{	return $this->fechaEstreno;		}
	public function getAnoProduccion()	{	return $this->anoProduccion;	}
	public function getDuracion()		{	return $this->duracion;			}
	public function getNota()			{	return $this->nota;				}
	public function getColor()			{	return $this->color;			}
	public function getLoMejor()		{	return $this->loMejor;			}
	public function getLoPeor()			{	return $this->loPeor;			}
	public function getImgPortada()		{	return $this->imgPortada;		}
	public function getUrlTrailer()		{	return $this->urlTrailer;		}
	public function getGeneroId()		{	return $this->generoId;			}
	public function getDirectorId()		{	return $this->directorId;		}

	// Mutadores
	public function setPeliculaId($peliculaId)			{ $this->peliculaId 	= $peliculaId;		}
	public function setTitulo($titulo)					{ $this->titulo 		= $titulo; 			}
	public function setSubtitulo($subtitulo) 			{ $this->subtitulo 		= $subtitulo;		}
	public function setFechaEstreno($fechaEstreno) 		{ $this->fechaEstreno 	= $fechaEstreno;	}
	public function setAnoProduccion($anoProduccion)	{ $this->anoProduccion 	= $anoProduccion;	}
	public function setDuracion($duracion) 				{ $this->duracion 		= $duracion;		}
	public function setNota($nota) 						{ $this->nota 			= $nota;			}
	public function setColor($color) 					{ $this->color 			= $color;			}
	public function setLoMejor($loMejor) 				{ $this->loMejor 		= $loMejor; 		}
	public function setLoPeor($loPeor)	 				{ $this->loPeor 		= $loPeor;			}
	public function setImgPortada($imgPortada)			{ $this->imgPortada 	= $imgPortada; 		}
	public function setUrlTrailer($urlTrailer)	 		{ $this->urlTrailer 	= $urlTrailer;		}
	public function setGeneroId($generoId)	 			{ $this->generoId 		= $generoId;		}
	public function setDirectorId($directorId)	 		{ $this->directorId 	= $directorId;		}

	
} // end Class
?>