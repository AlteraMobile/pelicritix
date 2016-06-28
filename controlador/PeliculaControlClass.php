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
		$this->pelicula 	= new Pelicula();
	}

	// Accesadores
	public function getConexion()	{ return $this->conexion;	}
	public function getDaoPelicula(){ return $this->daoPelicula;}
	public function getPelicula() 	{ return $this->Pelicula;	}

	// Mutadores
	public function setConexion($conexion)		{ $this->conexion = $conexion;			}
	public function setDaoPelicula($daoPelicula){ $this->daoPelicula = $daoPelicula;	}
	public function setPelicula($pelicula)		{ $this->pelicula = $pelicula;			}

	// Métodos
	public function agregarPelicula() {
		$pelicula 		= $this->pelicula;
		$titulo 		= $pelicula->getTitulo();
		$nota 			= $pelicula->getNota();
		if( empty($titulo) || is_null($titulo) )	{	return false;	}
		elseif( empty($nota) || is_null($nota)) 	{	return false;	}
		else {
			$resultado = $this->daoPelicula->agregar($pelicula);
			unset($this->pelicula);
			return $resultado;
		}
	}
	public function buscarPelicula($id) {
		$peliculas = $this->daoPelicula->buscar($id);
		foreach ($peliculas as $pelicula ) {
			$pelicula->getPeliculaId();
			$pelicula->getTitulo();
			$pelicula->getSubtitulo();
			$pelicula->getFechaEstreno();
			$pelicula->getAnoProduccion();
			$pelicula->getDuracion();
			$pelicula->getNota();
			$pelicula->getColor();
			$pelicula->getLoMejor();
			$pelicula->getLoPeor();
			$pelicula->getImgPortada();
			$pelicula->getUrlTrailer();
			$pelicula->getGeneroId();
			$pelicula->getDirectorId();
			return $pelicula;
		}
	}
	public function modificarPelicula() {
		$pelicula 		= $this->pelicula;
		$peliculaId 	= $pelicula->getPeliculaId();
		$titulo 		= $pelicula->getTitulo();
		$nota 			= $pelicula->getNota();
		if( empty($peliculaId) || is_null($peliculaId) )	{	return false;	}
		elseif( empty($titulo) || is_null($titulo) )		{	return false;	}
		elseif( empty($nota) || is_null($nota)) 			{	return false;	}
		else {
			$resultado = $this->daoPelicula->modificar($pelicula);
			unset($this->pelicula);
			return $resultado;
		}
	}
	public function eliminarPelicula($id) {
		$resultado = $this->daoPelicula->eliminar($id);
		return $resultado;
	}
	public function listarPeliculas() {
		$peliculas = $this->daoPelicula->listar();
		foreach ($peliculas as $pelicula){
			echo '<tr>
				  <td>'.$pelicula->getPeliculaId().'</td>';
			echo '<td>'.$pelicula->getTitulo().'</td>';
			echo '<td>'.$pelicula->getFechaEstreno().'</td>';
			echo '<td>';
			echo '<button
				name="operacion"
				value="modificar" 
				onClick="modificar('.$pelicula->getPeliculaId().');"
				id="'.$pelicula->getPeliculaId().'"
				class="btn btn-default btn-xs modificar_usuario"
				>
				<span class="glyphicon glyphicon-pencil"></span> Película
			</button>
			<button
				name="operacion"
				value="categoria" 
				onClick="categoria('.$pelicula->getPeliculaId().');"
				id="'.$pelicula->getPeliculaId().'"
				class="btn btn-default btn-xs modificar_usuario"
				>
				<span class="glyphicon glyphicon-pencil"></span> Categorías
			</button>

			<button
				name="operacion"
				value="reparto" 
				onClick="actor('.$pelicula->getPeliculaId().');"
				id="'.$pelicula->getPeliculaId().'"
				class="btn btn-default btn-xs modificar_usuario"
				>
				<span class="glyphicon glyphicon-pencil"></span> Reparto
			</button>
			<button
				name="operacion"
				value="critica" 
				onClick="critica('.$pelicula->getPeliculaId().');"
				id="'.$pelicula->getPeliculaId().'"
				class="btn btn-default btn-xs eliminar_usuario"
				>
				<span class="glyphicon glyphicon-remove" > </span> Crítica
			</button>
			<button
				name="operacion"
				value="eliminar" 
				onClick="eliminar('.$pelicula->getPeliculaId().');"
				id="'.$pelicula->getPeliculaId().'"
				class="btn btn-default btn-xs eliminar_usuario"
				>
				<span class="glyphicon glyphicon-remove" > </span>
			</button>
			</td></tr>';
		}
	}
}
?>