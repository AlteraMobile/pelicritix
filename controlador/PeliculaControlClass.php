<?php
require_once('/../entidades/PeliculaClass.php');
require_once('/../dao/PeliculaDAO.php');
require_once('/../dao/ConexionClass.php');

class PeliculaControl{

	// Atributos
	private $conexion;
	private $daoPelicula;
	private $pelicula;

	// Constructores
	function __construct(){
		$this->conexion 	= new Conexion();
		$this->daoPelicula 	= new PeliculaDAO($this->conexion);
		$this->pelicula 		= new Pelicula();
	}
	

	// Accesadores
	public function getConexion(){
		return $this->conexion;
	}
	public function getDaoPelicula(){
		return $this->daoPelicula;
	}
	public function getPelicula(){
		return $this->Pelicula;
	}

	// Mutadores
	public function setConexion($conexion){
		$this->conexion = $conexion;
	}
	public function setDaoPelicula($daoPelicula){
		$this->daoPelicula = $daoPelicula;
	}
	public function setPelicula($pelicula){
		$this->pelicula = $pelicula;
	}

	// Métodos
	public function agregarPelicula() {
		echo "3";
		// Validación de Formulario para agregar Pelicula
		$pelicula = $this->pelicula;

		$titulo = $pelicula->getTitulo();
		$subtitulo = $pelicula->getSubtitulo();
		$fecha_estreno = $pelicula->getFechaEstreno();
		$ano_produccion = $pelicula->getAnoProduccion();
		$duracion = $pelicula->getDuracion();
		$nota = $pelicula->getNota();
		$color = $pelicula->getColor();
		$lo_mejor = $pelicula->getLoMejor();
		$lo_peor = $pelicula->getLoPeor();
		$img_portada = $pelicula->getImgPortada();
		$url_trailer = $pelicula->getUrlTrailer(); 
		$genero_id = $pelicula->getGeneroId();
		$critica_id = $pelicula->getCriticaId(); 
		$director_id = $pelicula->getDirectorId();

				
		if( empty($titulo) || is_null($titulo) || strlen($titulo) < 3 ){
			return false;
		}
		elseif( empty($nota) || is_null($nota)) {
			return false;
		
		}
		else {
			
			$resultado = $this->daoPelicula->agregar($pelicula);
			$this->conexion->cerrarConexion();
			
			return $resultado;
		}
	}

	public function listarPeliculas() {
		$peliculas = $this->daoPelicula->listar();
		
		foreach ($peliculas as $pelicula){
			echo '<tr>
				  <td>'.$pelicula->getPeliculaId().'</td>';
			echo '<td>'.$pelicula->getTitulo().'</td>';
			echo '<td>'.$pelicula->getFechaEstreno().'</td>';
			echo '<td>';
			echo '<button class="btn btn-default btn-xs modificar_usuario" id="'.$pelicula->getPeliculaId().'">
				<span class="glyphicon glyphicon-pencil"></span>
			</button>
			<button class="btn btn-default btn-xs eliminar_usuario" id="'.$pelicula->getPeliculaId().'">
				<span class="glyphicon glyphicon-remove" ></span>
			</button></td></tr>';
		}
	}

}
?>