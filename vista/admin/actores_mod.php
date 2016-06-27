<?php 
	require_once('../../config/paths.php');
	require_once('../../entidades/ActorClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/ActorControlClass.php');

	$session = new SessionControl();

	// Buscar Actor
	if( isset($_GET['operacion']) && $_GET['operacion'] == 'modificar' ) {
		$actorControl 	= new ActorControl();
		$resultado 		= $actorControl->buscarActor( $_GET['id']);

		if( !empty($resultado) ) {
			$id 		= $resultado->getActorId();
			$nombres 	= $resultado->getNombre();
			$apellidos 	= $resultado->getApellido();
		}
	}

	// Modificar Actor
	if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'editar' ) {
		if( isset($_REQUEST['nombres']) && isset($_REQUEST['apellidos']) ) {
			$actor = new Actor();
			$actor->setActorId($_POST['id']);
			$actor->setNombre($_POST['nombres']);
			$actor->setApellido($_POST['apellidos']);

			$actorControl = new ActorControl();
			$actorControl->setActor($actor);
			$return = $actorControl->modificarActor();

			if( $return ) {
				?>
 					<script type="text/javascript" >
 					alert("El Actor fue modificado exitosamente!");
 					window.location.href = "actores.php";
 					</script>
 				<?php
			}
			else {
				?>
 					<script type="text/javascript" >
 						alert("Ocurrió un error. El Actor no se modificó!.");
 						window.location.href = "actores.php";
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
				<h1 class="col-lg-12">{ Actores }</h1>
			</div>
		</header>

		<section class="container">
		<h2>Modificar Actor</h2>
		<div id="form_modificar" title="Modificar Actor">
 			<form role="form" class="form-horizontal" name="actor_mod" method="post" onsubmit="return validarFormActorMod()" >
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
	      					 <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Cambiar</button>
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
		function validarFormActorMod() {
		    var nombres = document.forms["actor_mod"]["nombres"].value.trim();
		    var apellidos = document.forms["actor_mod"]["apellidos"].value.trim();
		  
		    if (nombres == null || nombres == "") {
		        alert("Debe ingresar nombres.");
		        return false;
		    }
		    else if(nombres.length < 3){
		    	alert("Nombres: debe tener un largo mayor a 3.");
		    	return false;
		    }
		    else if (apellidos == null || apellidos == ""){
		    	alert("Debe ingresar apellidos.");
		    	return false;
		    }
		    else if(apellidos.length < 3){
		    	alert("Apellidos: debe tener un largo mayor a 3.");
		    	return false;
		    }
		    else{
		    	return true;
		    }
		};
	</script>
</body>
</html>