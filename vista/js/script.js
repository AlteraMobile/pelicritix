jQuery(document).ready(function($) {

	//alert("ok");

	$( ".modificar_usuario" ).click( function(){
		$( "#form_mod_usuario" ).dialog({
		    height: 300,
		    width: 530,
      		modal: true,
      		resizable: true,
      		closeOnEscape: true,
      		
      	});
	});
	
	$( "#btn_nuevo" ).click( function(){
		$( "#form_mod_usuario" ).dialog({
		    height: 250,
		    width: 530,
      		modal: true,
      		resizable: true,
      		closeOnEscape: true,
      		
      	});
	});

	$( ".btn_mod_actor" ).click( function(){
		$( "#form_modificar" ).dialog({
		    height: 250,
		    width: 530,
      		modal: true,
      		resizable: true,
      		closeOnEscape: true,

      	});
	});

	$( ".btn_mod_slider" ).click( function(){
		$( "#form_mod_slider" ).dialog({
		    height: 200,
		    width: 500,
      		modal: true,
      		resizable: true,
      		closeOnEscape: true,

      	});
	});

	$( ".btn_mod_pelicula" ).click( function(){
		$( "#form_mod_pelicula" ).dialog({
		    height: 630,
		    width: 1200,
      		modal: true,
      		resizable: true,
      		closeOnEscape: true
      	});
	});

	$( "#btn_nuevo_slider" ).click( function(){
		$( "#form_slider" ).dialog({
		    height: 250,
		    width: 530,
      		modal: true,
      		resizable: true,
      		closeOnEscape: true,
      		
      	});
	});


	$('.my-slider').unslider({
		autoplay: true,
		arrows: true,
		infinite: true
	});

	var $grid = $(".grid").masonry({
		itemSelector: '.grid-item',
	 	columnWidth: 0,
	 	transitionDuration: '0.8s'
	});

	$(".btn_trailer").click(function(){
		var id = $(this).attr("id");
		$(".trailer"+id ).dialog({
		    height: 800,
		    width: 1000,
      		modal: true,
      		resizable: true,
      		closeOnEscape: true,
      	});
	})


	$( ".leer_mas" ).click(function() {
		
		var id = $(this).attr("id");

		if( $(this).attr( "value" ) == "Leer +" ){
			
			$(this).attr( "value","Leer -" );
		
		}
		else{
			$( this ).attr( "value","Leer +" );
			};

  		$( "#" + id + " p" ).toggle( "slow", function(){

  			$grid.masonry();
  		} );
	});

	
	
		

	/*
	$( "#estreno" ).datepicker({
      		changeMonth: true,
      		changeYear: true
   	});
	*/

});
