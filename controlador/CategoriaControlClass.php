<?php
require_once('/../entidades/CategoriaClass.php');
require_once('/../dao/CategoriaDAO.php');
require_once('/../dao/ConexionClass.php');

class CategoriaControl{

	// Atributos
	private $conexion;
	private $daoCategoria;
	private $categoria;

	// Constructores
	function __construct(){
		$this->conexion 		= new Conexion();
		$this->daoCategoria 	= new CategoriaDAO($this->conexion);
		$this->categoria 		= new Categoria();
	}
	

	// Accesadores
	public function getConexion(){
		return $this->conexion;
	}
	public function getDaoCategoria(){
		return $this->daoCategoria;
	}
	public function getCategoria(){
		return $this->Categoria;
	}

	// Mutadores
	public function setConexion($conexion){
		$this->conexion = $conexion;
	}
	public function setDaoCategoria($daoCategoria){
		$this->daoCategoria = $daoCategoria;
	}
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	// Métodos
	public function buscarCategoria($categoriaId) {
		$resultado = $this->daoCategoria->buscar($categoriaId);
		return $resultado;
	}
	public function buscarDescripcion($categoriaId) {
		$resultado = $this->daoCategoria->buscarDescripcion($categoriaId);
		return $resultado;
	}
	public function listarCategorias() {
		$categorias = $this->daoCategoria->listar();
		
		foreach ($categorias as $categoria){
			#$selected = "";
			#if(idcategoria existe rel)
			#$selected = "selected='selected'";

			echo '<option value="'.$categoria->getCategoriaId().'" >'.$categoria->getDescripcion().'</option>';
			
		}
	}

	

}
?>