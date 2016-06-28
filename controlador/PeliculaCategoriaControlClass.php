<?php
require_once('/../entidades/PeliculaCategoriaClass.php');
require_once('/../dao/PeliculaCategoriaDAO.php');
require_once('/../dao/ConexionClass.php');

class PeliculaCategoriaControl{

	// Atributos
	private $conexion;
	private $daoPeliculaCategoria;
	private $peliculaCategoria;

	// Constructores
	function __construct(){
		$this->conexion 			= new Conexion();
		$this->daoPeliculaCategoria	= new PeliculaCategoriaDAO($this->conexion);
		$this->peliculaCategoria 	= new PeliculaCategoria();
	}

	// Accesadores
	public function getConexion() 				{	return $this->conexion;				}
	public function getDaoPeliculaCategoria()	{	return $this->daoPeliculaCategoria;	}
	public function getPeliculaCategoria() 		{	return $this->peliculaCategoria;	}

	// Mutadores
	public function setConexion($conexion) 							{ 	$this->conexion = $conexion;						}
	public function setDaoPeliculaCategoria($daoPeliculaCategoria)	{	$this->daoPeliculaCategoria = $daoPeliculaCategoria;}
	public function setDirector($peliculaCategoria)					{	$this->peliculaCategoria = $peliculaCategoria;		}

	// Métodos
	public function agregarPeliculaCategoria($categoriaId, $peliculaId) {

		$resultado = $this->daoPeliculaCategoria->agregar($categoriaId, $peliculaId);
		$this->conexion->cerrarConexion();
		return $resultado;
	}
	public function eliminarPeliculaCategoria($peliculaId) {
		$resultado = $this->daoPeliculaCategoria->eliminar($peliculaId);
		$this->conexion->cerrarConexion();
		return $resultado;
	}

	public function buscarPeliculaCategoria($peliculaId) {
		$resultado = $this->daoPeliculaCategoria->buscar($peliculaId);
		$this->conexion->cerrarConexion();
		return $resultado;
	}
}
?>