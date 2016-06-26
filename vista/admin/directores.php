<?php 
	require_once('../../config/paths.php');
	require_once('../../entidades/DirectorClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/DirectorControlClass.php');

	$session = new SessionControl();

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

			<div class="row">
				<div class="col-xs-2 col-xs-offset-10">
					<button id="btn_nuevo_director" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
				</div>
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

			<div id="form_nuevo_director" title="Nuevo Director">
				<form role="form" class="form-horizontal" name="director" onsubmit="return validarFormDirector()" >
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

			<div id="form_modificar" title="Modificar Director">
 
  				<form role="form" class="form-horizontal" name="director_mod" onsubmit="return validarFormDirectorMod()" >
					<input type="hidden" name="id">
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
	      					 <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>
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

		 // Validar formulario Login
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