$('select#opcionpelicula').change(function(){
	var idPelicula = $(this).val();
	$.ajax({
		type: 'POST',
		url: '../controladores/llamadasporAjax/mostrarIdioma.php', 	
		data: {idPelicula: idPelicula} 
		}).done(function(data) {   
			$('#opcionidioma').html(data);
	}); 
});


$('select#opcionCiudades').change(function(){
	var Ciudad = $(this).val();
	$.ajax({
		type: 'POST',
		url: '../controladores/llamadasporAjax/mostrarSucursales.php', 	
		data: {Ciudad: Ciudad} 
		}).done(function(data) {   
			$('#Sucursales').html(data);
	}); 
});


$('select#ciudad').change(function(){
	var Ciudad = $(this).val();
	$.ajax({
		type: 'POST',
		url: '../controladores/llamadasporAjax/mostrarSucursales.php', 	
		data: {Ciudad: Ciudad} 
		}).done(function(data) {   
			$('#sucursal').html(data);
	}); 
});