<?php
require_once('ConexionClass.php');
require_once('/../entidades/PeliculaClass.php');

class PeliculaDAO{

	// Atributos
	private $conn;

	// Constructores
	function __construct($conn){
		$this->conn = $conn;
	}

	// Métodos
	public function buscarPeliculaID($pelicula){
		
	}
	

	public function agregar($pelicula){
		echo "3";
		$nombres 			= $pelicula->getNombres();
		$apellidos 			= $pelicula->getApellidos();
		
		$sql = "INSERT INTO actores (nombres, apellidos) VALUES ('".$nombres."','".$apellidos."')";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) ){
			return true;
			echo "2";
		}
		else {
			return false;
		}
		$this->conn->cerrarConexion();
	}

	public function actualizar($pelicula){
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
		

		$query = $this->conn->getConexion()->prepare("UPDATE pelicula SET titulo=?, subtitulo=?, fecha_estreno=?, ano_produccion=?, duracion=?, nota=?, color=?, lo_mejor=?, lo_peor=?, img_portada=?, url_trailer=?, genero_id=?, critica_id=?, director_id=?,  WHERE pelicula_id = ?");
		$query->bind_param($titulo, $subtitulo, $fecha_estreno, $ano_produccion, $duracion, $nota, $color, $lo_mejor, $lo_peor, $img_portada, $url_trailer, $genero_id, $critica_id, $director_id, $pelicula_id);
		return $conn->execute();
	}

	public function eliminar($peliculaId){
		$query = $this->conn->getConexion()->prepare("DELETE FROM peliculas WHERE pelicula_id = ?");
		$query->bind_param($pelicula);
		return $query->execute();
	}
	public function listar()
		{
			$sql = "SELECT pelicula_id, titulo, subtitulo, fecha_estreno, ano_produccion FROM peliculas";
			$this->conn->abrirConexion();
			$resultado = $this->conn->select($sql);
			$peliculas = array();

			while( $fila = $resultado->fetch_array() ) {
				$pelicula = new Pelicula();
				$pelicula->setPeliculaId($fila['pelicula_id']);
				$pelicula->setTitulo($fila['titulo']); 
				$pelicula->setFechaEstreno($fila['fecha_estreno']); 
				$peliculas[] = $pelicula;
			}
			$this->conn->cerrarConexion();
			return $peliculas;
		}

}// end Class
?>