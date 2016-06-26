<nav class="navbar navbar-default ">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">{ PeliCritix } <small>Administrador</small></a>
	   	</div>
	   	<div class="collapse navbar-collapse" id="menu">
	    	<ul class="nav navbar-nav">
	      		<li>
	      			<a href="dashboard.php">
	      				<span class="glyphicon glyphicon-dashboard"></span> Dashboard
	      			</a>
	      		</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-film"></span> Cinematografía
						<span class="caret"></span>
			    	</a>
			    	<ul class="dropdown-menu">
			    		<li><a href="add_pelicula.php">Agregar película</a></li>
			      		<li><a href="mod_pelicula.php">Modificar/Eliminar película</a></li>
			      	</ul>
				</li>
	      		<li>
					<a href="actores.php">
		      			<span class="glyphicon glyphicon-star-empty"></span> Actores
		      		</a>
		      	</li>
		      	<li>
					<a href="directores.php">
		      			<span class="glyphicon glyphicon-bullhorn"></span> Directores
		      		</a>
		      	</li>
		      	<!--
		      	<li>
					<a href="sliders.php">
		      			<span class="glyphicon glyphicon-picture"></span> Sliders
		      		</a>
		      	</li>
		      	-->
	      		<li>					      	
					<a href="registro_usuario.php">
	    	  			<span class="glyphicon glyphicon-user"></span> Registro Usuario
		      		</a>
			   	</li>
		   	</ul>
		   	<ul class="nav navbar-nav navbar-right">
		    	<li>
		    		<a href="../../index.php">
		    			<span class="glyphicon glyphicon-log-out"></span> Cerrar
		    		</a>
		    	</li>
		    </ul>
		</div>
	</div>
</nav>