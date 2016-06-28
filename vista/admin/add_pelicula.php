<?php
	
	require_once('../../config/paths.php');
	require_once('../../entidades/CategoriaClass.php');
	require_once('../../entidades/PeliculaClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/CategoriaControlClass.php');
	require_once('../../controlador/PeliculaControlClass.php');
	require_once('../../controlador/DirectorControlClass.php');
	require_once('../../controlador/ActorControlClass.php');
	require_once('../../controlador/GeneroControlClass.php');

	$session = new SessionControl();

	// Agregar nueva pelicula
	if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'agregar' ) {
		if( isset($_REQUEST['titulo'])	&& $_REQUEST['nota'] ) {
			$pelicula = new Pelicula();

			$pelicula->setTitulo( 		$_POST['titulo'])		;
			$pelicula->setSubtitulo(	$_POST['subtitulo'])	;
			$pelicula->setFechaEstreno(	$_POST['fechaEstreno'])	;
			$pelicula->setAnoProduccion($_POST['anoProduccion']);
			$pelicula->setDuracion(		$_POST['duracion'])		;
			$pelicula->setNota(			$_POST['nota'])			;
			$pelicula->setColor(		$_POST['color'])		;
			$pelicula->setLoMejor(		$_POST['loMejor'])		;
			$pelicula->setLoPeor(		$_POST['loPeor'])		;
			$pelicula->setImgPortada(	$_POST['imgPortada'])	;
			$pelicula->setUrlTrailer(	$_POST['urlTrailer'])	;
			$pelicula->setGeneroId(		$_POST['generoId'])		;
			$pelicula->setDirectorId(	$_POST['directorId'])	;

			$peliculaControl = new PeliculaControl();
			$peliculaControl->setPelicula($pelicula);
			$return = $peliculaControl->agregarPelicula();

			if( $return ) {
?>
 				<script type="text/javascript" >
 					alert("La pelicula fue agregado exitosamente!");
 					window.location.href = "list_pelicula.php";
 				</script>
<?php
 			}
 			else {
?>
 				<script type="text/javascript" >
 					alert("Ocurrió un error. La pelicula no fue guardado!.");
 					window.location.href = "add_pelicula.php";
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
			<h1 class="col-lg-12">{ Películas } <small>Agregar</small></h1>

		</div>
	</header>
	<section class="container">
		<div class="row">
			<form role="form" name="pelicula" method="post" onsubmit="return validarFormAddPelicula()">
				<input type="hidden" name="operacion" value="agregar">
				<div class="form-group col-lg-4 col-sm-6">
					<label for="titulo">Título*</label>
					<input type="text" class="form-control input-sm" id="titulo" name="titulo" placeholder="Título">
				</div>
				<div class="form-group col-lg-4 col-sm-6">
					<label for="subtitulo">Subtítulo</label>
					<input type="text" class="form-control input-sm" id="subtitulo" name="subtitulo" placeholder="Subtítulo">
				</div>
				<div class="form-group col-lg-2 col-sm-4">
					<label for="estreno">Fecha de estreno</label>
					<input type="date" class="form-control input-sm" id="estreno" name="fechaEstreno" placeholder="Fecha de estreno">
				</div>
				<div class="form-group col-lg-2 col-sm-4">
					<label for="produccion">Año de producción</label>
					<input type="text" class="form-control input-sm" id="produccion" name="anoProduccion" placeholder="Año de producción">
				</div>
				<div class="form-group col-lg-2 col-sm-4">
					<label for="duracion">Duración en minutos</label>
					<input type="text" class="form-control input-sm" id="duracion" name="duracion" placeholder="Duración en minutos">
				</div>
				<div class="form-group col-lg-1 col-sm-2">
	  					<label for="nota">Nota*</label>
					  	<input type="number" step="0.1" min="0" max="10" class="form-control input-sm" rows="5" id="nota" name="nota" placeholder="0-10">
				</div>
				<div class="form-group col-lg-1 col-sm-2">
					<label for="color">Color</label>
					<select class="form-control input-sm" id="color" name="color">
				        <option>Color</option>
				        <option>Blanco y negro</option>
      				</select>
				</div>
				<div class="form-group col-lg-2 col-sm-4">
					<label for="genero">Genero</label>
					<select class="form-control input-sm" id="genero" name="generoId">
<?php
							$generoControl = new GeneroControl();
							$generoControl->comboGenero();
?>
      				</select>
				</div>
				<div class="form-group col-lg-2 col-sm-4">
					<label for="color">Director</label>
					<select class="form-control input-sm" id="director" name="directorId">
						<?php
						$directorControl = new DirectorControl();
						$directorControl->comboDirectores();
						?>
      				</select>
				</div>
				<div class="form-group col-lg-6 col-sm-6">
					<label>Lo mejor</label>
					<input type="text" class="form-control input-sm" id="mejor" name="loMejor" placeholder="Lo mejor">
				</div>
				<div class="form-group col-lg-6 col-sm-6">
					<label>Lo peor</label>
					<input type="text" class="form-control input-sm" id="peor" name="loPeor" placeholder="Lo peor">
				</div>
				<div class="form-group col-lg-3 col-sm-6">
					<label>Imágen de Portada</label>
					<input type="text" class="form-control input-sm" id="portada" name="imgPortada" placeholder="URL de la imagen de portada.">
				</div>
				<div class="form-group col-lg-3 col-sm-6">
					<label>URL del trailer</label>
					<input type="url" class="form-control input-sm" id="trailer" name="urlTrailer" placeholder="URL del trailer">
				</div>
				
				 <div class="clearfix visible-lg"></div>
				<button type="submit" class="btn btn-default col-xs-4 col-xs-offset-4 btn-info ">
					<span class="glyphicon glyphicon-ok"></span> Agregar</button>
			</form>
		</div>
	</section>
	</div>
<?php
		require_once('../footer.php');
		require_once('../js_link.php');
?>
	<script type="text/javascript">
		function validarFormAddPelicula() {
		    var titulo 		= document.forms["pelicula"]["titulo"].value.trim();
		    var nota 		= document.forms["pelicula"]["nota"].value;

		    if (titulo == null || titulo == "")				{ alert("Debe ingresar un titulo.");				return false;	}
		    else if (categoria == null || categoria =="")	{ alert("Debe ingresar al menos una categoría.");  	return false;   }
		    else if (critica == null || critica =="")		{ alert("Debe ingresar una crítica");		    	return false; 	}
		    else if(nota == null || nota == "")				{ alert("Debe ingresar una nota.");			    	return false; 	}
		    else 											{													return true;    }
		};
	</script>
</body>
</html>