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

$('select#opcionCiudadeslogeado').change(function(){
	var Ciudad = $(this).val();
	$.ajax({
		type: 'POST',
		url: '../controladores/llamadasporAjax/mostrarSucursales_admin.php', 	
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

$('select#ddlViewByCiudad').change(function(){
	var Ciudad = $(this).val();
	$.ajax({
		type: 'POST',
		url: '../controladores/llamadasporAjax/admin_mostrarCiudad.php', 	
		data: {Ciudad: Ciudad} 
		}).done(function(data) {   
			$('#ddlViewBy').html(data);
	}); 
});

$('select#ciudadSala').change(function(){
	var Ciudad = $(this).val();
	$.ajax({
		type: 'POST',
		url: '../controladores/llamadasporAjax/admin_mostrarSucursales.php', 	
		data: {Ciudad: Ciudad} 
		}).done(function(data) {   
			$('#sucursal').html(data);
	}); 
});


/*$('#divOrderTickets').click(function(){
	var edad = $('#rptAreaCategory__ctl0_rptTicketList__ctl1_ddlQtyInput').val();
	alert("hi");
});*/