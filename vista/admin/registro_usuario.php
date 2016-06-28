<?php
	

	require_once('../../config/paths.php');
	require_once('../../entidades/UsuarioClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/UsuarioControlClass.php');

	$session = new SessionControl();
	// Agregar nuevo Usuario
 	if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'agregar'){
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
 				$return = $usuarioControl->agregarUsuario();
 
 				if($return) {
 				?>
 					<script type="text/javascript" >
 					alert("El usuario fue agregado exitosamente!");
 					window.location.href = "registro_usuario.php";
 					</script>
 				<?php
 				}
 				else {
 				?>
 					<script type="text/javascript" >
 						alert("Ocurrió un error. El usuario no fue guardado!.");
 						window.location.href = "registro_usuario.php";
 					</script>
 				<?php
 				}
 			}
 		}
 		else {}

 	// Eliminar Usuario
	if(isset($_GET['operacion']) && $_GET['operacion'] == 'eliminar'){
		$id 			= $_GET['id'];
		$usuarioControl = new UsuarioControl();
		$return 		= $usuarioControl->eliminarUsuario($id);
		if( $return ) {
			?>
				<script type="text/javascript">
					alert("El usuario fue eliminado correctamente!");
					window.location.href = "registro_usuario.php";
				</script>
			<?php

		}
		else {
			?>
				<script type="text/javascript">
					alert("Error: Usuario no fue eliminado.");
					window.location.href = "registro_usuario.php";
				</script>
			<?php
		}
	}

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
			<div id="form_usuario">

				<h2>Nuevo Usuario</h2>
				<form role="form" name="usuario" method="post" onsubmit="return validarFormAddUsuario()">
					<input type="hidden" name="operacion" value="agregar">
					<div class="form-group col-lg-5 col-sm-4">
						<label for="titulo">Nombres*</label>
						<input type="text" class="form-control input-sm" id="nombres" name="nombres" placeholder="Nombres">
					</div>
					<div class="form-group col-lg-5 col-sm-4">
						<label for="subtitulo">Apellidos*</label>
						<input type="text" class="form-control input-sm" id="apellidos" name="apellidos" placeholder="Apellidos">
					</div>
					<div class="form-group col-lg-2 col-sm-4">
						<label for="estreno">Fecha de Nacimiento*</label>
						<input type="date" class="form-control input-sm" id="fechaNacimiento" name="fechaNacimiento" placeholder="Fecha de Nacimiento">
					</div>
					<div class="form-group col-lg-4 col-sm-4">
						<label for="produccion">Nombre de Usuario*</label><input type="text" class="form-control input-sm" id="nom_usu" name="nombreUsuario" placeholder="Nombre de Usuario">
					</div>
					<div class="form-group col-lg-4 col-sm-4">
					  <label>Contraseña*</label>
						<input type="password" class="form-control input-sm" id="pass" name="pass" placeholder="Contraseña">
					</div>
					<div class="form-group col-lg-4 col-sm-4">
					  <label>Repetir Contraseña*</label>
						<input type="password" class="form-control input-sm" id="pass2" name="pass2" placeholder="Repetir Contraseña">
					</div>
					<div class="clearfix visible-lg"></div>
					<button type="submit" class="btn btn-default col-sm-2 col-sm-offset-5 col-xs-4 col-xs-offset-4 btn-info ">
						<span class="glyphicon glyphicon-ok"></span> Agregar</button>

				</form>
			</div>
		</div>

		<div class="espacio"></div>
		<div class="row">
			<div id="registro_usuario">
				<table id="tbl_usuarios" name="tbl_usuarios" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<td>Id</td>
							<td>Nombres</td>
							<td>Apellidos</td>
							<td>Fecha Nacimiento</td>
							<td>Nombre Usuario</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
					<?php
						$usuarioControl = new UsuarioControl();
						$usuarioControl->listarUsuarios();
					?>
					</tbody>	
				</table>
			</div>
		</div>
	</section>
	</div>
<?php
	require_once('../footer.php');
	require_once('../js_link.php');
?>
	<script type="text/javascript">

		$("#tbl_usuarios").DataTable();
		// Validar formulario Login
		function validarFormAddUsuario() {
		    var nombres 		= document.forms["usuario"]["nombres"].value.trim();
		    var apellidos 		= document.forms["usuario"]["apellidos"].value.trim();
		    var fechaNacimiento = document.forms["usuario"]["fechaNacimiento"].value.trim();
		    var nombreUsuario 	= document.forms["usuario"]["nombreUsuario"].value.trim();
		    var pass 			= document.forms["usuario"]["pass"].value.trim();
		    var pass2 			= document.forms["usuario"]["pass2"].value.trim();
		    
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

		   	else if (nombreUsuario == null || nombreUsuario ==""){
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
		function eliminar( id ) {
			window.location.href = "registro_usuario.php?operacion=eliminar&id="+id;
		};
		function modificar( id ) {
			window.location.href = "registro_usuario_mod.php?operacion=modificar&id="+id;
		};
	</script>
	
</body>
</html>