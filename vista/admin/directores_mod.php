<?php 
	require_once('../../config/paths.php');
	require_once('../../entidades/DirectorClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/DirectorControlClass.php');

	$session = new SessionControl();

	//Buscar Director
	if( isset($_GET['operacion']) && $_GET['operacion'] == 'modificar' ) {
		$directorControl 	= new DirectorControl();
		$resultado			= $directorControl->buscarDirector( $_GET['id'] );
		if( !empty($resultado) ) {
			$id			= $resultado->getDirectorId();
			$nombres 	= $resultado->getNombre();
			$apellidos 	= $resultado->getApellido();
		}
	}

	// Modificar Director
	if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'editar' ) {
		if( isset($_REQUEST['nombres']) && isset($_REQUEST['apellidos']) ) {
			$director 			= new Director();
			$director->setDirectorId($_POST['id']);
			$director->setNombre($_POST['nombres']);
			$director->setApellido($_POST['apellidos']);

			$directorControl 	= new DirectorControl();
			$directorControl->setDirector($director);
			$return 			= $directorControl->modificarDirector();
			if( $return ) {
				?>
 					<script type="text/javascript" >
 					alert("El director fue modificado exitosamente!");
 					window.location.href = "directores.php";
 					</script>
 				<?php
			}
			else {
				?>
 					<script type="text/javascript" >
 						alert("Ocurrió un error. El director no se modificó!.");
 						window.location.href = "directores.php";
 					</script>
 				<?php
			}
		}
	}


	require_once('header.php');
?>
		<header class="container">
			<div class="row">
			<?php 
				require_once('menu.php');
			?>
				<h1 class="col-lg-12">{ Directores }</h1>

			</div>
		</header>

		<section class="container">
		<h2>Modificar Director</h2>
			
			<div id="form_modificar" title="Modificar Director">
 
  				<form role="form" class="form-horizontal" name="director" method="post" onsubmit="return validarFormDirectorMod()" >
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="operacion" value="editar">
					<div class="form-group">
						<label for="nombres" class="col-lg-2 col-lg-offset-1 control-label">*Nombres:</label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="nombres" placeholfer="Nombres" value="<?php echo $nombres; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="apellidos" class="col-lg-2 col-lg-offset-1 control-label">*Apellidos:</label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="apellidos" placeholfer="Apellidos" value="<?php echo $apellidos; ?>">
						</div>
					</div>
					 <div class="form-group">
	    				<div class="col-lg-6 col-lg-offset-3">
	      					 <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> Cambiar</button>
	    				</div>
				</form>
			</div>
		</section>
	</div>
	<?php 
		require_once('../footer.php');
		require_once('../js_link.php');
	?>
	<script type="text/javascript">
		 $("#directores").DataTable();

		function validarFormDirectorMod() {
		    var nombres = document.forms["director_mod"]["nombres"].value.trim();
		    var apellidos = document.forms["director_mod"]["apellidos"].value.trim();
		  
		   if (nombres == null || nombres == "") {
		        alert("Debe ingresar nombres.");
		        return false;
		    }
		    else if ( nombres.length <3 ){
		    	alert("Nombres: longitud mínima 3.");
		    	return false;
		    }
		    else if (apellidos == null || apellidos == ""){
		    	alert("Debe ingresar apellidos.");
		    	return false;
		    }
		    else if(apellidos.length < 3){
		    	alert("Apellidos: longitud mínima 3.");
		    	return false;
		    }
		    else{
		    	return true;
		    }
		};

		
		
	</script>
</body>
</html>