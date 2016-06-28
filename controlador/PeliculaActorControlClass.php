<?php
require_once('/../entidades/PeliculaActorClass.php');
require_once('/../dao/PeliculaActorDAO.php');
require_once('/../dao/ConexionClass.php');

class PeliculaActorControl{

	// Atributos
	private $conexion;
	private $daoPeliculaCategoria;
	private $peliculaActor;

	// Constructores
	function __construct(){
		$this->conexion 			= new Conexion();
		$this->daoPeliculaActor 	= new PeliculaActorDAO($this->conexion);
		$this->peliculaActor 		= new PeliculaActor();
	}

	// Accesadores
	public function getConexion() 				{	return $this->conexion;				}
	public function getDaoPeliculaActor()		{	return $this->daoPeliculaActor;		}
	public function getPeliculaActor()	 		{	return $this->peliculaActor;		}

	// Mutadores
	public function setConexion($conexion) 					{ 	$this->conexion = $conexion;						}
	public function setDaoPeliculaActor($daoPeliculaActor)	{	$this->daoPeliculaActor = $daoPeliculaActor;}
	public function setDirector($peliculaActor)				{	$this->peliculaActor = $peliculaActor;		}

	// Métodos
	public function agregarPeliculaActor($actorId, $peliculaId) {

		$resultado = $this->daoPeliculaActor->agregar($actorId, $peliculaId);
		$this->conexion->cerrarConexion();
		return $resultado;
	}
	public function eliminarPeliculaActor($peliculaId) {
		$resultado = $this->daoPeliculaActor->eliminar($peliculaId);
		$this->conexion->cerrarConexion();
		return $resultado;
	}

	public function buscarPeliculaActor($peliculaId) {
		$resultado = $this->daoPeliculaActor->buscar($peliculaId);
		$this->conexion->cerrarConexion();
		return $resultado;
	}
}
?>