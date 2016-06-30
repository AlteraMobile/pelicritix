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
	public function agregar($pelicula){
	 	$titulo 			= $pelicula->getTitulo()		;
	 	$subtitulo 			= $pelicula->getSubtitulo()		;
	 	$fechaEstreno 		= $pelicula->getFechaEstreno()	;
		$anoProduccion 		= $pelicula->getAnoProduccion()	;
	 	$duracion 			= $pelicula->getDuracion()		;
	 	$nota 				= $pelicula->getNota()			;
 		$color 				= $pelicula->getColor()			;
		$loMejor 			= $pelicula->getLoMejor()		;
 		$loPeor 			= $pelicula->getLoPeor()		;
		$imgPortada 		= $pelicula->getImgPortada()	;
 		$urlTrailer 		= $pelicula->getUrlTrailer()	;
		$generoId 			= $pelicula->getGeneroId()		;
		$directorId 		= $pelicula->getDirectorId()	;
		$sql = "INSERT INTO peliculas 
				(titulo
				, subtitulo
				, fecha_estreno
				, ano_produccion
				, duracion
				, nota
				, color
				, lo_mejor
				, lo_peor
				, img_portada
				, url_trailer
				, genero_id
				, critica_id
				, director_id
				) VALUES 
				('".$titulo."'
				,'".$subtitulo."'
				,'".$fechaEstreno."'
				,'".$anoProduccion."'
				,'".$duracion."'
				,'".$nota."'
				,'".$color."'
				,'".$loMejor."'
				,'".$loPeor."'
				,'".$imgPortada."'
				,'".$urlTrailer."'
				,'".$generoId."'
				,'1'
				,'".$directorId."'
				)";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) ) { return true; }
		else 							{ return false;}
		$this->conn->cerrarConexion();
	}
	public function buscar($id){
		$sql = "SELECT pelicula_id, titulo, subtitulo, fecha_estreno, ano_produccion, duracion, nota, color, lo_mejor, lo_peor, img_portada, url_trailer, genero_id, director_id FROM peliculas WHERE pelicula_id = '".$id."'";
		$this->conn->abrirConexion();
		$resultado =$this->conn->select($sql);
		$peliculas =  array();
		while( $fila = $resultado->fetch_array() ) {
			$pelicula = new Pelicula();
			$pelicula->setPeliculaId(		$fila['pelicula_id'])	;
			$pelicula->setTitulo(			$fila['titulo'])		;
			$pelicula->setSubtitulo(		$fila['subtitulo'])		;
			$pelicula->setFechaEstreno(		$fila['fecha_estreno'])	;
			$pelicula->setAnoProduccion(	$fila['ano_produccion']);
			$pelicula->setDuracion(			$fila['duracion'])		;
			$pelicula->setNota(				$fila['nota'])			;
			$pelicula->setColor(			$fila['color'])			;
			$pelicula->setLoMejor(			$fila['lo_mejor'])		;
			$pelicula->setLoPeor(			$fila['lo_peor'])		;
			$pelicula->setImgPortada(		$fila['img_portada'])	;
			$pelicula->setUrlTrailer(		$fila['url_trailer'])	;
			$pelicula->setGeneroId(			$fila['genero_id'])		;
			$pelicula->setDirectorId(		$fila['director_id'])	;
			$peliculas[] = $pelicula;
		}
		$this->conn->cerrarConexion();
		return $peliculas;
	}

	public function modificar($pelicula){
		$peliculaId 		= $pelicula->getPeliculaId()	;
		$titulo 			= $pelicula->getTitulo()		;
		$subtitulo 			= $pelicula->getSubtitulo()		;
		$fechaEstreno		= $pelicula->getFechaEstreno()	;
		$anoProduccion 		= $pelicula->getAnoProduccion()	;
		$duracion 			= $pelicula->getDuracion()		;
		$nota 				= $pelicula->getNota()			;
		$color 				= $pelicula->getColor()			;
		$loMejor 			= $pelicula->getLoMejor()		;
		$loPeor 			= $pelicula->getLoPeor()		;
		$imgPortada 		= $pelicula->getImgPortada()	;
		$urlTrailer 		= $pelicula->getUrlTrailer()	; 
		$generoId 			= $pelicula->getGeneroId()		;
		$directorId 		= $pelicula->getDirectorId()	;
		$sql = "UPDATE peliculas SET
				titulo = '$titulo', 
				subtitulo = '$subtitulo', 
				fecha_estreno = '$fechaEstreno', 
				ano_produccion = '$anoProduccion', 
				duracion = '$duracion', 
				nota = '$nota', 
				color = '$color', 
				lo_mejor = '$loMejor', 
				lo_peor = '$loPeor', 
				img_portada = '$imgPortada', 
				url_trailer = '$urlTrailer', 
				genero_id = '$generoId', 
				director_id = '$directorId' 
				WHERE 
				pelicula_id = '$peliculaId' ";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) ) { return true; }
		else 							{ return false;}
		$this->conn->cerrarConexion();
	}
	public function eliminar($peliculaId){
		$sql = "DELETE FROM peliculas WHERE pelicula_id ='".$peliculaId."'";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) ) { return true; }
		else 							{ return false;}
		$this->conn->cerrarConexion();
	}
	public function listar(){
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
	public function mostrarPeliculas(){
			$sql = "SELECT * FROM peliculas";
			$this->conn->abrirConexion();
			$resultado = $this->conn->select($sql);
			$peliculas = array();
			while( $fila = $resultado->fetch_array() ) {
				$pelicula = new Pelicula();
				$pelicula->setPeliculaId(		$fila['pelicula_id']);
				$pelicula->setTitulo(			$fila['titulo']);
				$pelicula->setSubtitulo(		$fila['subtitulo']);
				$pelicula->setFechaEstreno(		$fila['fecha_estreno']);
				$pelicula->setAnoProduccion(	$fila['ano_produccion']);
				$pelicula->setDuracion(			$fila['duracion']);
				$pelicula->setNota(				$fila['nota']);
				$pelicula->setColor(			$fila['color']);
				$pelicula->setLoMejor(			$fila['lo_mejor']);
				$pelicula->setLoPeor(			$fila['lo_peor']);
				$pelicula->setImgPortada(		$fila['img_portada']);
				$pelicula->setUrlTrailer(		$fila['url_trailer']);
				$pelicula->setGeneroId(			$fila['genero_id']);
				$pelicula->setDirectorId(		$fila['director_id']);
				$peliculas[] = $pelicula;
			}
			$this->conn->cerrarConexion();
			return $peliculas;
		}

}// end Class
?>