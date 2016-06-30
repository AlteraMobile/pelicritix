<?php
require_once('/../entidades/PeliculaClass.php');
require_once('/../entidades/ActorClass.php');
require_once('/../entidades/CategoriaClass.php');
require_once('/../entidades/PeliculaCategoriaClass.php');
require_once('/../entidades/PeliculaActorClass.php');
require_once('/../entidades/DirectorClass.php');
require_once('/../entidades/CriticaClass.php');

require_once('/../controlador/ActorControlClass.php');
require_once('/../controlador/PeliculaCategoriaControlClass.php');
require_once('/../controlador/PeliculaActorControlClass.php');
require_once('/../controlador/CategoriaControlClass.php');
require_once('/../controlador/DirectorControlClass.php');
require_once('/../controlador/CriticaControlClass.php');

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
				<span class="glyphicon glyphicon-pencil" > </span> Crítica
			</button>
			<button
				name="operacion"
				value="eliminar" 
				onClick="eliminar('.$pelicula->getPeliculaId().');"
				id="'.$pelicula->getPeliculaId().'"
				class="btn btn-default btn-xs eliminar_usuario"
				>
				<span class="glyphicon glyphicon-remove" > </span> Eliminar
			</button>
			</td></tr>';
		}
	}

	public function mostrarPeliculas() {
		$peliculas = $this->daoPelicula->mostrarPeliculas();
		foreach ($peliculas as $pelicula){
			// Empieza el grid-item
			// PeliculaId
			echo '<div class="grid-item" id="'.$pelicula->getPeliculaId().'">';

			// Imagen de portada
			if(!empty($pelicula->getImgPortada()) && !is_null($pelicula->getImgPortada()) ){
				echo '<div class="cont_caratula">';
				echo '<img src="contenido/img/cover/'.$pelicula->getImgPortada();
				echo '" >';
				echo '</div>';
			}

			// Nota
			echo '<div class="ranking">';
			echo $pelicula->getNota();
			echo '</div>';

			// Título
			echo '<hgroup><h1>';
			echo $pelicula->getTitulo();
			echo '</h1>';
			

			// Subtitulo
			if(!empty($pelicula->getSubtitulo()) && !is_null($pelicula->getSubtitulo()) ){
				echo '<h3>';
				echo $pelicula->getSubtitulo();
				echo '</h3>';
			}
			echo '</hgroup>';

			// Trailer
			if(!empty($pelicula->getUrlTrailer()) && !is_null($pelicula->getUrlTrailer()) ){
				echo '<span id="';
				echo $pelicula->getPeliculaId();
				echo '"class="glyphicon glyphicon-play play btn_trailer" aria-hidden="true"></span>';
				echo '<div class="trailer';
				echo $pelicula->getPeliculaId();
				echo ' trailer">';
				echo '<iframe  width="960" height="720" src="';
				echo $pelicula->getUrlTrailer();
				echo '" frameborder="0" allowfullscreen></iframe></div>';
			}

			echo '<div class="detalle"><table width="251">';

			// Fecha de Estreno
			if(!empty($pelicula->getFechaEstreno()) && !is_null($pelicula->getFechaEstreno()) ){
				echo '<tr><td class="bold" width="100">';
				echo 'Fecha de Produccion: </td><td>';
				echo $pelicula->getFechaEstreno();
				echo '</td></tr>';
			}

			// Año de Produccion
			if(!empty($pelicula->getAnoProduccion()) && !is_null($pelicula->getAnoProduccion()) ){
				echo '<tr><td class="bold">Año de Producción:</td><td>';
				echo $pelicula->getAnoProduccion();
				echo '</td></tr>';
			}

			// Duración
			if(!empty($pelicula->getDuracion()) && !is_null($pelicula->getDuracion()) ){
				echo '<tr><td class="bold">Duración:</td><td>';
				echo $pelicula->getDuracion();
				echo '</td></tr>';
			}

			// Color
			if(!empty($pelicula->getColor()) && !is_null($pelicula->getColor()) ){
				echo '<tr><td class="bold">Color:</td><td>';
				echo $pelicula->getColor();
				echo '</td></tr>';
			}


			$peliculaCategoriaControl = new PeliculaCategoriaControl();
	 		$categoriasActuales = $peliculaCategoriaControl->buscarPeliculaCategoria($pelicula->getPeliculaId());

	 		
			// Categorías
			if(!empty($categoriasActuales) && !is_null($categoriasActuales) ) {
				echo '<tr><td class="bold">Categoría:</td><td>';

				foreach ($categoriasActuales as $categoriaActual) {
	 			$categoriaControl = new CategoriaControl();
	 			$categoria = $categoriaControl->buscarDescripcion($categoriaActual->getCategoriaId());
	 			$categoria2 = $categoria->getDescripcion();
	 			echo $categoria2.", ";
	 		}

				echo '</td></tr>';
			}
			// Genero
			if(!empty($pelicula->getGeneroId()) && !is_null($pelicula->getGeneroId()) ){
				echo '<tr><td class="bold">Genero:</td><td>';
				echo 'Película';
				echo '</td></tr>';
			}

			$peliculaActorControl = new PeliculaActorControl();
	 		$actoresActuales = $peliculaActorControl->buscarPeliculaActor($pelicula->getPeliculaId());

			// Reparto
			if(!empty($actoresActuales) && !is_null($actoresActuales) ) {
				echo '<tr><td class="bold">Reparto:</td><td>';

				foreach ($actoresActuales as $actorActual) {
	 			$actorControl = new ActorControl();
	 			$actor = $actorControl->buscarActor($actorActual->getActorId());
	 			$actor2 = $actor->getNombre();
	 			$actor3 = $actor->getApellido();
	 			echo $actor2." ".$actor3.", ";
	 		}
	 	}

	 		// Director
			if(!empty($pelicula->getDirectorId()) && !is_null($pelicula->getDirectorId()) ){
				echo '<tr><td class="bold">Director:</td><td>';
				$directorControl = new DirectorControl();
				$director = $directorControl->buscarDirector($pelicula->getDirectorId());
				$nombre = $director->getNombre();
				$apellido = $director->getApellido();
				echo $nombre." ".$apellido.", ";
				echo '</td></tr>';
			}
			if(!empty($pelicula->getLoMejor()) && !is_null($pelicula->getLoMejor()) ){
				echo '<tr><td class="bold">Lo mejor:</td><td>';
				echo $pelicula->getLoMejor();
				echo '</td></tr>';
			}

			// Lo peor
			if(!empty($pelicula->getLoPeor()) && !is_null($pelicula->getLoPeor()) ){
				echo '<tr><td class="bold">Lo peor:</td><td>';
				echo $pelicula->getLoPeor();
				echo '</td></tr>';
			}

			// cerramos tabla
			echo '</table></div>';

				// Critica
			$criticaControl = new CriticaControl();
			$critica = $criticaControl->buscarCritica($pelicula->getPeliculaId());
			$critica2 = $critica->getComentario();
			echo '<div class="min_critica">';
			echo substr($critica2, 0, 57);
			echo '</div>';
			echo '<div id="';
			echo $pelicula->getPeliculaId();
			echo '" class="max_critica"><p>';
			echo substr($critica2, 58);
			echo '</p><input id="';
			echo $pelicula->getPeliculaId();
			echo '" class="btn btn-default btn-info leer_mas" value="Leer +"></div></div>';
		}
	}
}
?>