<?php
require_once('/../entidades/CriticaClass.php');
require_once('/../dao/CriticaDAO.php');
require_once('/../dao/ConexionClass.php');

class CriticaControl{

	// Atributos
	private $conexion;
	private $daoCritica;
	private $critica;

	// Constructores
	function __construct(){
		$this->conexion 		= new Conexion();
		$this->daoCritica	 	= new CriticaDAO($this->conexion);
		$this->critica  		= new Critica();
	}

	// Accesadores
	public function getConexion()	{ return $this->conexion;	}
	public function getDaoCritica()	{ return $this->daoCritica;	}
	public function getCritica()	{ return $this->critica;	}

	// Mutadores
	public function setConexion($conexion)		{ $this->conexion = $conexion; 		}
	public function setDaoCritica($daoCritica) 	{ $this->daoCritica= $daoCritica;	}
	public function setCritica($critica) 		{ $this->critica = $critica;		}

	// Métodos
	public function agregarCritica(){
		$critica = $this->critica;

		$criticaId 		= $critica->getCriticaId();
		$comentario 	= $critica->getComentario();
		$fechaCritica	= $critica->getFechaCritica();
		$usuarioId 		= $critica->getUsuarioId();
		$peliculaId 	= $critica->getPeliculaId();

		if( empty($comentario) || is_null($comentario) ) 			{ return false;	}
		elseif( empty($fechaCritica) || is_null($fechaCritica) ) 	{ return false;	}
		elseif( empty($peliculaId) || is_null($peliculaId) ) 		{ return false;	}
		else {
			if( empty($criticaId) || is_null($criticaId) || $criticaId < 1 ) {
				$resultado = $this->daoCritica->agregarNuevo($critica);
			}
			else {
				$resultado = $this->daoCritica->modificar($critica);
			}
			return $resultado;
		}
	}
	public function listarCritica() {
		$criticas = $this->daoCritica->listar();
		
		foreach ($criticas as $critica){
			echo '<OPTION VALUE="'.$critica->getCriticaId().'" >'.$critica->getComentario().'</option>';
			
		}
	}
	public function buscarCritica($peliculaId) {
		$resultado = $this->daoCritica->buscar($peliculaId);
		return $resultado;
	}

}
?>