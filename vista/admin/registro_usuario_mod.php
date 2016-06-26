<?php
	

	require_once('../../config/paths.php');
	require_once('../../entidades/UsuarioClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/UsuarioControlClass.php');

	$session = new SessionControl();
	// Buscar Usuario
	if(isset($_GET['operacion']) && $_GET['operacion'] == 'modificar') {
		
		$usuarioControl = new UsuarioControl();
		$resultado = $usuarioControl->buscarUsuario($_GET['id']);
		if(!empty($resultado) ){
			$id					= $resultado->getUsuarioId();
			$nombres 			= $resultado->getNombres();
			$apellidos 			= $resultado->getApellidos();
			$fechaNacimiento	= $resultado->getFechaNacimiento();
			$nombreUsuario		= $resultado->getNombreUsuario();
			$pass 				= $resultado->getPass();
		}
	}
	// Modificar Usuario
	if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'modificar'){
 		if( isset($_REQUEST["nombres"]) && isset($_REQUEST["apellidos"]) && isset($_REQUEST["fechaNacimiento"])
 			&& isset($_REQUEST["nombreUsuario"]) &&	isset($_REQUEST["pass"]) &&	isset($_REQUEST["pass2"]) ) {
 				
 				$usuario = new Usuario();
 			
 				$usuario->setNombres($_POST["nombres"]);
 				$usuario->setApellidos($_POST["apellidos"]);
 				$usuario->setFechaNacimiento($_POST["fechaNacimiento"]);
 				$usuario->setNombreUsuario($_POST["nombreUsuario"]);
 				$usuario->setPass($_POST["pass"]);
 				$usuario->setPass2($_POST["pass2"]);
 				$usuario->setActivo(1);
 
 				$usuarioControl = new UsuarioControl();
 				$usuarioControl->setUsuario($usuario);
 				$return = $usuarioControl->modificarUsuario();
 
 				if($return) {
 				?>
 					<script type="text/javascript" >
 					alert("El usuario fue modificado exitosamente!");
 					window.location.href = "registro_usuario.php";
 					</script>
 				<?php
 				}
 				else {
 				?>
 					<script type="text/javascript" >
 						alert("Ocurrió un error. El usuario no se modificó!.");
 						window.location.href = "registro_usuario.php";
 					</script>
 				<?php
 				}
 			}
 		}
 		else {}

	require_once('header.php');

	?>
	<header class="container">
		<div class="row">
		<?php
			require_once('menu.php');
		?>
			<h1 class="col-lg-12">{ Registro Usuario }</h1>

		</div>
	</header>
	<section class="container">
		<div class="row">
			
			<div id="form_mod_usuario" title="Modificar Usuario">
				<h2>Modificar Usuario</h2>
				<form role="form" name="mod_usuario" onsubmit="return validarFormModUsuario()">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<div class="form-group col-lg-6 col-sm-6">
						<label for="titulo">Nombres*</label>
						<input type="text" class="form-control input-sm" id="nombres" name="nombres" placeholder="Nombres" value="<?php echo $nombres; ?>">
					</div>
					<div class="form-group col-lg-6 col-sm-6">
						<label for="subtitulo">Apellidos*</label>
						<input type="text" class="form-control input-sm" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $apellidos; ?>">
					</div>
					<div class="form-group col-lg-6 col-sm-6">
						<label for="estreno">Fecha de Nacimiento*</label>
						<input type="date" class="form-control input-sm" id="fechaNacimiento" name="fechaNacimiento" placeholder="Fecha de Nacimiento" value="<?php echo $fechaNacimiento; ?>">
					</div>
					<div class="form-group col-lg-6 col-sm-6">
						<label for="produccion">Nombre de Usuario*</label><input type="text" class="form-control input-sm" id="nom_usu" name="nom_usu" placeholder="Nombre de Usuario" value="<?php echo $nombreUsuario; ?>">
					</div>
					<div class="form-group col-lg-6 col-sm-6">
					  <label>Contraseña*</label>
						<input type="password" class="form-control input-sm" id="pass" name="pass" placeholder="Contraseña" value="<?php echo $pass; ?>">
					</div>
					<div class="form-group col-lg-6 col-sm-6">
					  <label>Repetir Contraseña*</label>
						<input type="password" class="form-control input-sm" id="pass2" name="pass2" placeholder="Repetir Contraseña" value="<?php echo $pass; ?>">
					</div>
					<div class="clearfix visible-lg"></div>
					<button type="submit" class="btn btn-default col-xs-4 col-xs-offset-4 btn-info " >
						<span class="glyphicon glyphicon-ok"></span> Cambiar</button>

				</form>
			</div>	
		</div>
	</section>
	</div>
<?php
	require_once('../footer.php');
	require_once('../js_link.php');
?>
	<script type="text/javascript">
		function validarFormModUsuario() {
		    var nombres 		= document.forms["mod_usuario"]["nombres"].value.trim();
		    var apellidos 		= document.forms["mod_usuario"]["apellidos"].value.trim();
		    var fechaNacimiento = document.forms["mod_usuario"]["fecha"].value.trim();
		    var nombreUsuario 	= document.forms["mod_usuario"]["nombreUsuario"].value.trim();
		    var pass 			= document.forms["mod_usuario"]["pass"].value.trim();
		    var pass2 			= document.forms["mod_usuario"]["pass2"].value.trim();
		    
		    if (nombres == null || nombres == "") {
		        alert("Debe ingresar Nombres.");
		        return false;
		    }
		    else if(nombres.length < 3){
		    	alert("Nombres: longitud mínima 3.");
		    	return false;
		    } 
		    else if (apellidos == null || apellidos ==""){
		    	alert("Debe ingresar Apellidos.");
		    	return false;
		    }
		    else if( apellidos.length < 3){
		    	alert("Apellidos: longitud mínima 3.");
		    	return false;
		    }
		    else if (fechaNacimiento == null || fechaNacimiento ==""){
		    	alert("Debe ingresar una Fecha.");
		    	return false;
		    }
		   	else if (nombreUsuario == null || nom_usu ==""){
		    	alert("Debe ingresar un Nombre de Usuario.");
		    	return false;
		    }
		    else if(nombreUsuario.length < 3){
		    	alert("Usuario: longitud mínima 3.");
		    	return false;
		    }
		    else if (pass == null || pass ==""){
		    	alert("Debe ingresar una Contraseña.");
		    	return false;
		    }
		    else if (pass2 == null || pass2 == "") {
		    	alert("Debe repetir la contraseña.");
		    	return false;
		    }
		    else if(pass !== pass2){
		    	alert("Las contraseñas no coinciden. Deben ser iguales.");
		    	return false;
		    }
		    else if(pass.length < 6){
		    	alert("Contraseña: longitud mínima 6.");
		    	return false;
		    }
		    else{
		    	return true;
		    }
		};
	</script>
	
</body>
</html>