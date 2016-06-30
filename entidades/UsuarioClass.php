<?php 
/**
*	Clase Usuario
*	
*/
class Usuario{

	// Atributos
	private $usuarioId;
	private $nombres;
	private $apellidos;
	private $fechaNacimiento;
	private $nombreUsuario;
	private $pass;
	private $pass2;
	private $activo;

	// Constructores
	function __construct(){
		$this->usuarioId 		= "";
		$this->nombres 			= "";
		$this->apellidos 		= "";
		$this->fechaNacimiento 	= "";
		$this->nombreUsuario 	= "";
		$this->pass 			= "";
		$this->pass2 			= "";
		$this->activo 			= "";
	}

	// Accesadores
	public function getUsuarioId()		{	return $this->usuarioId;		}
	public function getNombres()		{	return $this->nombres;			}
	public function getApellidos()		{	return $this->apellidos;		}
	public function getFechaNacimiento(){	return $this->fechaNacimiento;	}
	public function getNombreUsuario()	{	return $this->nombreUsuario;	}
	public function getPass()			{	return $this->pass;				}
	public function getPass2()			{	return $this->pass2;			}
	public function getActivo()			{	return $this->activo;			}

	// Mutadores
	public function setUsuarioId($usuarioId)				{	$this->usuarioId 		= $usuarioId;				}
	public function setNombres($nombres)					{	$this->nombres 			= $nombres;					}
	public function setApellidos($apellidos)				{	$this->apellidos 		= $apellidos;				}
	public function setFechaNacimiento($fechaNacimiento)	{	$this->fechaNacimiento 	= $fechaNacimiento;			}
	public function setNombreUsuario($nombreUsuario)		{	$this->nombreUsuario 	= $nombreUsuario;			}
	public function setPass($pass)							{	$this->pass 			= $pass;					}
	public function setPass2($pass2)						{	$this->pass2 			= $pass2;					}
	public function setActivo($activo)						{	$this->activo 			= $activo;					}
} // end Class
?>