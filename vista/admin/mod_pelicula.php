<?php 
	require_once('header.php');
?>
		<header class="container">
			<div class="row">
				<?php 
					require_once('menu.php');
				?>
				<h1 class="col-lg-12">{ Películas } <small>Modificar</small></h1>
			</div>
		</header>
		<section class="container">
			<div class="row">
				<div class="clearfix visible-lg"></div>
				<table id="mod_peliculas" name="pelicula" class="display" cellspacing="0" width="100%" >
					<thead>
						<tr>
							<td>Id</td>
							<td>Título</td>
							<td>Genero</td>
							<td>Director</td>
							<td>Año producción</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Id</td>
							<td>Título</td>
							<td>Genero</td>
							<td>Director</td>
							<td>Año producción</td>
							<td>
								<button id="1" class="btn btn-default btn-xs btn_mod_pelicula"><span class="glyphicon glyphicon-pencil"></span> </button> 
								<button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove "></span></button>
							</td>
						</tr>
						<tr>
							<td>Id</td>
							<td>Título</td>
							<td>Genero</td>
							<td>Director</td>
							<td>Año producción</td>
							<td>
								<button id="2" class="btn btn-default btn-xs btn_mod_pelicula"><span class="glyphicon glyphicon-pencil"></span> </button> 
								<button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove "></span></button>
							</td>
						</tr>
						<tr>
							<td>Id</td>
							<td>Título</td>
							<td>Genero</td>
							<td>Director</td>
							<td>Año producción</td>
							<td>
								<button id="3" class="btn btn-default btn-xs btn_mod_pelicula"><span class="glyphicon glyphicon-pencil"></span> </button> 
								<button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove "></span></button>
							</td>

						</tr>
						<tr>
							<td>Id</td>
							<td>Título</td>
							<td>Genero</td>
							<td>Director</td>
							<td>Año producción</td>
							<td>
								<button id="4" class="btn btn-default btn-xs btn_mod_pelicula"><span class="glyphicon glyphicon-pencil"></span> </button> 
								<button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove "></span></button>
							</td>
						</tr>
						<tr>
							<td>Id</td>
							<td>Título</td>
							<td>Genero</td>
							<td>Director</td>
							<td>Año producción</td>
							<td>
								<button id="5" class="btn btn-default btn-xs btn_mod_pelicula"><span class="glyphicon glyphicon-pencil"></span> </button> 
								<button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove "></span></button>
							</td>

						</tr>
						<tr>
							<td>Id</td>
							<td>Título</td>
							<td>Genero</td>
							<td>Director</td>
							<td>Año producción</td>
							<td>
								<button id="6" class="btn btn-default btn-xs btn_mod_pelicula"><span class="glyphicon glyphicon-pencil"></span> </button> 
								<button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove "></span></button>
							</td>
						</tr>
					</tbody>
				</table>

			</div>
		</section>
		<p></p>
		<section class="container">
			<div class="row">
				<div class="clearfix visible-lg"></div>
				<div id="form_mod_pelicula" title="Modificar Película">
				
				<form role="form" name="pelicula" onsubmit="return validarFormModPelicula()">
					<input type="hidden" value="id">
					
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
						<input type="date" class="form-control input-sm" id="estreno" name="estreno" placeholder="Fecha de estreno">
					</div>
					<div class="form-group col-lg-2 col-sm-4">
						<label for="produccion">Año de producción</label>
						<input type="text" class="form-control input-sm" id="produccion" name="produccion" placeholder="Año de producción">
					</div>
					<div class="form-group col-lg-2 col-sm-4">
						<label for="duracion">Duración en minutos</label>
						<input type="text" class="form-control input-sm" id="duracion" name="duracion" placeholder="Duración en minutos">
					</div>
					<div class="form-group col-lg-2 col-sm-4">
						<label for="color">Color</label>
						<select class="form-control input-sm" id="color" name="color">
					        <option>Color</option>
					        <option>Blanco y negro</option>
	      				</select>
					</div>
					<div class="form-group col-lg-2 col-sm-4">
						<label for="genero">Genero</label>
						<select class="form-control input-sm" id="genero" name="genero">
							<option>Película</option>
					        <option>Documental</option>
					        <option>Cortometraje</option>
	      				</select>
					</div>
					<div class="form-group col-lg-2 col-sm-6">
						<label for="color">Director</label>
						<select class="form-control input-sm" id="director" name="director">
							<option>Director</option>
					        <option>Spielberg</option>
					        <option>Cohen</option>
	      				</select>
					</div>
					<div class="form-group col-lg-6 col-sm-6">
						<label>Lo mejor</label>
						<input type="text" class="form-control input-sm" id="mejor" name="mejor" placeholder="Lo mejor">
					</div>
					<div class="form-group col-lg-6 col-sm-6">
						<label>Lo peor</label>
						<input type="text" class="form-control input-sm" id="peor" name="peor" placeholder="Lo peor">
					</div>
					<div class="form-group col-lg-3 col-sm-6">
						<label>Imágen de Portada</label>
						<input type="file" class="form-control input-sm" id="portada" name="portada" placeholder="Seleccione la imagen de portada.">
					</div>
					<div class="form-group col-lg-3 col-sm-6">
						<label>URL del trailer</label>
						<input type="url" class="form-control input-sm" id="trailer" name="trailer" placeholder="URL del trailer">
					</div>
					<div class="form-group col-lg-3 col-sm-6">
						<label for="categoria">Categoría*</label>
					    <select multiple class="form-control input-sm" id="categoria" name="categoria">
						    <option>Acción</option>
						    <option>Drama</option>
						    <option>Comedia</option>
						    <option>Terror</option>
						    <option>Acción</option>
						    <option>Drama</option>
						    <option>Comedia</option>
						    <option>Terror</option>
					    </select>
					</div>

					<div class="form-group col-lg-3 col-sm-6">
						<label for="reparto">Reparto</label>
					    <select multiple class="form-control input-sm" id="reparto" name="reparto">
						    <option>Juan</option>
						    <option>Maria</option>
						    <option>Lukas</option>
						    <option>Fernando</option>
						    <option>Ignacia</option>
					    </select>
					</div>

					<div class="form-group col-sm-10">
	  					<label for="critica">Crítica*</label>
					  	<textarea class="form-control input-sm" rows="5" id="critica" name="critica"></textarea>
					</div>
					<div class="form-group col-sm-2">
	  					<label for="nota">Nota*</label>
					  	<input type="number" step="0.1" min="0" max="10" class="form-control input-sm" rows="5" id="nota" name="nota" placeholder="0-10">
					</div>
					<div class="clearfix visible-lg"></div>
					<button type="submit" class="btn btn-default col-lg-2 col-lg-offset-5 btn-info btn-sm">
						<span class="glyphicon glyphicon-pencil"></span> Modifiar</button>

				</form>
				
			</div>
		</section>

	</div>
	<?php
			require_once('../footer.php');
			require_once('../js_link.php');
	?>
	<script type="text/javascript">
		$("#mod_peliculas").DataTable();

		// Validar formulario Modificar Pelicula
		function validarFormModPelicula() {
		    var titulo = document.forms["pelicula"]["titulo"].value.trim();
		    var categoria = document.forms["pelicula"]["categoria"].value.trim();
		    var critica = document.forms["pelicula"]["critica"].value.trim();
		    var nota = document.forms["pelicula"]["nota"].value;

		    if (titulo == null || titulo == "") {
		        alert("Debe ingresar un título para la película.");
		        return false;
		    }
		    else if (categoria == null || categoria ==""){
		    	alert("Debe ingresar al menos una categoría.");
		    	return false;
		    }
		    else if (critica == null || critica ==""){
		    	alert("Debe ingresar una crítica.");
		    	return false;
		    }
		    else if( nota == null || nota == ""){
		    	alert("Debe ingresar una nota.");
		    	return false;
		    }
		    else{
		    	return true;
		    }
		};

	</script>

</body>
</html>