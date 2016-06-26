<?php 
/**
*	Clase Pelicula
*	
*/
class Pelicula{

	// Atributos
	private $pelicula_id;
	private $titulo;
	private $subtitulo;
	private $fecha_estreno;
	private $ano_produccion;
	private $duracion;
	private $nota;
	private $color;
	private $lo_mejor;
	private $lo_peor;
	private $img_portada;
	private $url_trailer;
	private $genero_id;
	private $critica_id;
	private $director_id;

	// Cosntructores
	function __construct(){
		$this->pelicula_id="";
		$this->titulo = "";
		$this->subtitulo = "";
		$this->fecha_estreno = "";
		$this->ano_produccion = "";
		$this->duracion = "";
		$this->nota = "";
		$this->color = "";
		$this->lo_mejor = "";
		$this->lo_peor = "";
		$this->img_portada = "";
		$this->url_trailer = "";
		$this->genero_id = "";
		$this->critica_id = "";
		$this->director_id = "";

	}
	
	// Accesadores
	public function getPeliculaId(){
		return $this->pelicula_id;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function getSubtitulo(){
		return $this->subtitulo;
	}
	public function getFechaEstreno(){
		return $this->fecha_estreno;
	}
	public function getAnoProduccion(){
		return $this->ano_produccion;
	}
	public function getDuracion(){
		return $this->duracion;
	}
	public function getNota(){
		return $this->nota;
	}
	public function getColor(){
		return $this->color;
	}
	public function getLoMejor(){
		return $this->lo_mejor;
	}
	public function getLoPeor(){
		return $this->lo_peor;
	}
	public function getImgPortada(){
		return $this->img_portada;
	}
	public function getUrlTrailer(){
		return $this->url_trailer;
	}
	public function getGeneroId(){
		return $this->genero_id;
	}
	public function getCriticaId(){
		return $this->critica_id;
	}
	public function getDirectorId(){
		return $this->director_id;
	}

	// Mutadores
	public function setPeliculaId($pelicula_id){
		$this->pelicula_id = $pelicula_id;
	}
	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}
	public function setSubtitulo($subtitulo){
		$this->subtitulo = $subtitulo;
	}
	public function setFechaEstreno($fecha_estreno){
		$this->fecha_estreno = $fecha_estreno;
	}
	public function setAnoProduccion($ano_produccion){
		$this->ano_produccion = $ano_produccion;
	}
	public function setDuracion($duracion){
		$this->duracion = $duracion;
	}
	public function setNota($nota){
		$this->nota = $nota;
	}
	public function setColor($color){
		$this->color = $color;
	}
	public function setLoMejor($lo_mejor){
		$this->lo_mejor = $lo_mejor;
	}
	public function setLoPeor($lo_peor){
		$this->lo_peor = $lo_peor;
	}
	public function setImgPortada($img_portada){
		$this->img_portada = $img_portada;
	}
	public function setUrlTrailer($url_trailer){
		$this->url_trailer = $url_trailer;
	}

	
} // end Class
?>