<?php
/**
*	Clase Conexion
*
*/

class Conexion{
	
	// Atributos
	private $host		= "localhost";
	private $user		= "pelicritix";
	private $pass		= "pelicritix123";
	private $database	= "pelicritix";
	private $conn;

	// Constructores
	function __construct(){
		$this->conn = new Mysqli($this->host, $this->user, $this->pass);
		$this->conn->set_charset("utf8");
		$this->conn->select_db($this->database);

		if($conn){
			return true;
		}
		else{
			die("Error al conectarse a la base de datos.");
		}
	}

	// Accesadores
	public function getConexion(){
		return $this->conn;
	}

	// Métodos
	public function cerrarConexion(){
		$this->conn->close();
	}

}// end class

?>