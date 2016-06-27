<?php 
	require_once('../../config/paths.php');
	require_once('../../entidades/ActorClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/ActorControlClass.php');

	$session = new SessionControl();

	// Agregar un Actor
	if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'agregar' ) {
		if( isset($_REQUEST['nombres']) && isset($_REQUEST['apellidos']) ) {
			$actor = new Actor();

			$actor->setNombre($_POST['nombres']);
			$actor->setApellido($_POST['apellidos']);

			$actorControl = new ActorControl();
			$actorControl->setActor($actor);

			$return = $actorControl->agregarActor();

			if( $return ) {
			?>
 					<script type="text/javascript" >
 					alert("El actor fue agregado exitosamente!");
 					window.location.href = "actores.php";
 					</script>
 				<?php
			}
			else{
				?>
 					<script type="text/javascript" >
 						alert("Ocurrió un error. El actor no fue guardado!.");
 						window.location.href = "actores.php";
 					</script>
 				<?php
			}
		}
	}

	// Eliminar Actor
	if( isset($_GET['operacion']) && $_GET['operacion'] == 'eliminar' ) {
		$id = $_GET['id'];
		$actorControl = new ActorControl();
		$return = $actorControl->eliminarActor($id);

		if( $return ) {
			?>
				<script type="text/javascript">
					alert("El actor fue eliminado correctamente!");
					window.location.href = "actores.php";
				</script>
			<?php
		}
		else {
			?>
				<script type="text/javascript">
					alert("Error: Actor no fue eliminado.");
					window.location.href = "actores.php";
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
				<h1 class="col-lg-12">{ Actores }</h1>
			</div>
		</header>

		<section class="container">
			<div id="form_nuevo" title="Nuevo Actor">
			<h2>Nuevo Actor</h2>
				<form role="form" class="form-horizontal" name="actor" method="post" onsubmit="return validarFormActor()" >
					<input type="hidden" name="operacion" value="agregar">
					<div class="form-group">
						<label for="nombres" class="col-lg-2 col-lg-offset-1 control-label">*Nombres:</label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="nombres" placeholfer="Nombres">
						</div>
					</div>
					<div class="form-group">
						<label for="apellidos" class="col-lg-2 col-lg-offset-1 control-label">*Apellidos:</label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="apellidos" placeholfer="Apellidos">
						</div>
					</div>
					 <div class="form-group">
	    				<div class="col-lg-6 col-lg-offset-3">
	      					 <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> Crear</button>
	    				</div>
				</form>
			</div>
			

			<div class="espacio"></div>

			<div class="row">
				<table id="actores" name="actor" class="display" cellspacing="0" width="100%" >
					<thead>
						<tr>
							<td>Id</td>
							<td>Nombres</td>
							<td>Apellidos</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
					<?php
						$actorControl = new ActorControl();
						$actorControl->listarActores();
					?>
					</tbody>
				</table>
			</div>
			<div class="espacio"></div>
		</section>
	</div>
	<?php 
		require_once('../footer.php');
		require_once('../js_link.php');
	?>
	<script type="text/javascript">
		 $("#actores").DataTable();

		 // Validar formulario Actor
		function validarFormActor() {
		    var nombres = document.forms["actor"]["nombres"].value.trim();
		    var apellidos = document.forms["actor"]["apellidos"].value.trim();
		  
		    if (nombres == null || nombres == "") {
		        alert("Debe ingresar nombres.");
		        return false;
		    }
		    else if(nombres.length < 2){
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

		function eliminar( id ) {
			window.location.href = "actores.php?operacion=eliminar&id="+id;
		};
		function modificar( id ) {
			window.location.href = "actores_mod.php?operacion=modificar&id="+id;
		}

	</script>
</body>
</html>