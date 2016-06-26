<?php
require_once('/../entidades/DirectorClass.php');
require_once('/../dao/DirectorDAO.php');
require_once('/../dao/ConexionClass.php');

class DirectorControl{

	// Atributos
	private $conexion;
	private $daoDirector;
	private $director;

	// Constructores
	function __construct(){
		$this->conexion 	= new Conexion();
		$this->daoDirector 	= new DirectorDAO($this->conexion);
		$this->director 		= new Director();
	}
	

	// Accesadores
	public function getConexion(){
		return $this->conexion;
	}
	public function getDaoDirector(){
		return $this->daoDirector;
	}
	public function getDirector(){
		return $this->Director;
	}

	// Mutadores
	public function setConexion($conexion){
		$this->conexion = $conexion;
	}
	public function setDaoDirector($daoDirector){
		$this->daoDirector = $daoDirector;
	}
	public function setDirector($director){
		$this->director = $director;
	}

	// Métodos
	public function agregarDirector() {
		echo "3";
		// Validación de Formulario para agregar Usuario
		$director = $this->director;

		$nombres 			= $director->getNombres();
		$apellidos 			= $director->getApellidos();
		
		if( empty($nombres) || is_null($nombres) || strlen($nombres) < 3 ){
			return false;
		}
		elseif( empty($apellidos) || is_null($apellidos) || strlen($apellidos) < 3 ) {
			return false;
		}
		else {
			echo "4";
			$resultado = $this->daoDirector->agregar($director);
			$this->conexion->cerrarConexion();
			//unset($this->usuario);
			return $resultado;
		}
	}

	public function listarDirectores() {
		$directores = $this->daoDirector->listar();
		
		foreach ($directores as $director){
			echo '<tr><td>'.$director->getDirectorId().'</td>';
			echo '<td>'.$director->getNombre().'</td>';
			echo '<td>'.$director->getApellido().'</td>';
			echo '<td>';
			echo '<button class="btn btn-default btn-xs modificar_usuario" id="'.$director->getDirectorId().'">
				<span class="glyphicon glyphicon-pencil"></span>
			</button>
			<button class="btn btn-default btn-xs eliminar_usuario" id="'.$director->getDirectorId().'">
				<span class="glyphicon glyphicon-remove" ></span>
			</button></td></tr>';
		}
	}

		public function comboDirectores() {
		$directores = $this->daoDirector->listar();
		
		foreach ($directores as $directorcombo){
			echo '<OPTION VALUE="'.$directorcombo->getDirectorId().'">'.$directorcombo->getNombre().' '.$directorcombo->getApellido().'</option>';
			
		}
	}

}
?>