<?php
require_once('/../entidades/ActorClass.php');
require_once('/../dao/ActorDAO.php');
require_once('/../dao/ConexionClass.php');

class ActorControl{

	// Atributos
	private $conexion;
	private $daoActor;
	private $actor;

	// Constructores
	function __construct(){
		$this->conexion 	= new Conexion();
		$this->daoActor 	= new ActorDAO($this->conexion);
		$this->actor 		= new Actor();
	}

	// Accesadores
	public function getConexion()	{ 	return $this->conexion;	}
	public function getDaoActor()	{ 	return $this->daoActor;	}
	public function getActor()		{ 	return $this->Actor; 	}

	// Mutadores
	public function setConexion($conexion) 	{	$this->conexion = $conexion;	}
	public function setDaoActor($daoActor)	{	$this->daoActor = $daoActor; 	}
	public function setActor($actor)		{	$this->actor = $actor; 			}

	// Métodos
	public function agregarActor() {
		$actor 				= $this->actor;
		$nombres 			= $actor->getNombre();
		$apellidos 			= $actor->getApellido();
		
		if( empty($nombres) || is_null($nombres) || strlen($nombres) < 2 ) 			{	return false;	}
		elseif( empty($apellidos) || is_null($apellidos) || strlen($apellidos) < 3 ){	return false;	}
		else {
			$resultado 		= $this->daoActor->agregar($actor);
			unset($this->actor);
			return $resultado;
		}
	}
	public function buscarActor($id) {
		$actores = $this->daoActor->buscar($id);
		foreach ( $actores as $actor ) {
			$actor->getActorId();
			$actor->getNombre();
			$actor->getApellido();
			return $actor;
		}
	}
	public function modificarActor() {
		$actor = $this->actor;

		$actorId 			= $actor->getActorId();
		$nombres 			= $actor->getNombre();
		$apellidos 			= $actor->getApellido();

		if( empty($nombres) || is_null($nombres) || strlen($nombres) < 3 ) 		{	return false;	}
		elseif( empty($apellidos) || is_null($apellidos) || strlen($apellidos)) {	return false;	}
		else {
			$resultado 		= $this->daoActor->modificar($actor);
			unset($this->actor);
			return $resultado;
		}
	}
	public function eliminarActor($id) {
		$resultado 			= $this->daoActor->eliminar($id);
		return $resultado;
	}
	public function listarActores() {
		$actores 			= $this->daoActor->listar();
		foreach ($actores as $actor){
			echo '<tr><td>'.$actor->getActorId().'</td>';
			echo '<td>'.$actor->getNombre().'</td>';
			echo '<td>'.$actor->getApellido().'</td>';
			echo '<td>';
			echo '<button
					name="operacion"
					value="modificar"
					id="'.$actor->getActorId().'"
					onClick="modificar('.$actor->getActorId().')"
					class="btn btn-default btn-xs modificar_usuario" 
					><span class="glyphicon glyphicon-pencil"></span>
				</button>
				<button
					name="operacion"
					value="eliminar"
					id="'.$actor->getActorId().'"
					onClick="eliminar('.$actor->getActorId().');"
					class="btn btn-default btn-xs eliminar_usuario"	
					><span class="glyphicon glyphicon-remove" ></span>
				</button></td></tr>';
		}
	}
	public function comboReparto() {
		$actores = $this->daoActor->listar();
		foreach ($actores as $actorcombo){
			echo '<OPTION VALUE="'.$actorcombo->getActorId().'">'.$actorcombo->getNombre().' '.$actorcombo->getApellido().'</option>';
		}
	}
}
?>