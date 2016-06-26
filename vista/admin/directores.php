<?php 
	require_once('../../config/paths.php');
	require_once('../../entidades/DirectorClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/DirectorControlClass.php');

	$session = new SessionControl();

	// Agregar nuevo Director
	if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'agregar' ) {
		if( isset($_REQUEST['nombres']) && isset($_REQUEST['apellidos']) ) {
			$director = new Director();

			$director->setNombre($_POST['nombres']);
			$director->setApellido($_POST['apellidos']);

			$directorControl = new DirectorControl();
			$directorControl->setDirector($director);

			$return = $directorControl->agregarDirector();

			if( $return ) {
				?>
 					<script type="text/javascript" >
 					alert("El director fue agregado exitosamente!");
 					window.location.href = "directores.php";
 					</script>
 				<?php
			}
			else{
				?>
 					<script type="text/javascript" >
 						alert("Ocurrió un error. El director no fue guardado!.");
 						window.location.href = "directores.php";
 					</script>
 				<?php
			}
		}
	}
	// Eliminar Director
	if( isset($_GET['operacion']) && $_GET['operacion'] == 'eliminar' ) {
		$id 				= $_GET['id'];
		$directorControl 	= new DirectorControl();
		$return				= $directorControl->eliminarDirector($id);
		if( $return ) {
			?>
				<script type="text/javascript">
					alert("El director fue eliminado correctamente!");
					window.location.href = "directores.php";
				</script>
			<?php
		}
		else {
			?>
				<script type="text/javascript">
					alert("Error: Director no fue eliminado.");
					window.location.href = "directores.php";
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
				<h1 class="col-lg-12">{ Directores }</h1>

			</div>
		</header>

		<section class="container">
			<div id="form_nuevo_director" title="Nuevo Director">
				<h2>Nuevo Director</h2>
				<form role="form" class="form-horizontal" name="director" method="post" onsubmit="return validarFormDirector()" >
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
				<table id="directores" name="directores" class="display" cellspacing="0" width="100%" >
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
						$directorControl = new DirectorControl();
						$directorControl->listarDirectores();
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
		 $("#directores").DataTable();

		function validarFormDirector() {
		    var nombres = document.forms["director"]["nombres"].value.trim();
		    var apellidos = document.forms["director"]["apellidos"].value.trim();
		  
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

		function eliminar( id ) {
			window.location.href = "directores.php?operacion=eliminar&id="+id;
		};
		function modificar( id ) {
			window.location.href = "directores_mod.php?operacion=modificar&id="+id;
		}
	</script>
</body>
</html>