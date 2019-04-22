function configurarTabla () {
	$("#tblPeriodos").dataTable({
		'proccessing':true,
		'serverSide':true,
		'ajax':'periodo/listar',
		'columns':[
			{'data':'id','visible':false},
			{'data':'nombre'},
			{'data':'duracion'},
			{'data':'año'},
			{'data':'descripcion'},
			{'defaultContent':"<button type='button' id='Editar' class='btn btn-success' style='padding: 4px 10px;margin: 2px;' ><i class='fa fa-pencil-square-o'></i></button><button type='button' id='Eliminar' style='padding: 4px 10px;' class='btn btn-danger'><i class='fa fa-trash-o'></i></button>",'sWidth':'9%'}
		]
	});
}

function insertar(){
	//$("#Enviar").click(function(){
		$.post('periodo/insertar', $("#FormPeriodo").serializeObject(),function(rpta) {
			if(rpta.Estado == "Registrado")
			{
				mensajePersonalizado("Periódo","Periódo Creado Correctamente","success",3000);	
			}
			else if(rpta.Estado == "Editado")
			{
				mensajePersonalizado("Periódo","Periódo Editado Correctamente","success",3000);
			}
			else{
				mensajePersonalizado("Periódo","Ocurrio un error","error",3000);
			}
			$("#Accion").val('Registrar');
			limpiarForm('FormPeriodo');
			$("#Anio").val("");

			$("#tblPeriodos").DataTable().draw().clear();
		});
	//});
}

function viewData(){
	$("#tblPeriodos").on('click','#Editar',function(){
		var data = $("#tblPeriodos").dataTable().fnGetData($(this).closest('tr'));
		//console.log(data);
		$.post('periodo/sesion',{id:data.id},function(rpta){
			if(rpta.Sesion == "Asignado"){
				$('#myTab a[href="#tab_2"]').tab('show');
				$("#Nombre").val(data.nombre);
				$("#Duracion").val(data.duracion);

				$("#Anio").val(data.año).trigger('change');
				$("#Descripcion").val(data.descripcion);
				$("#Accion").val('Editar');
			}else {
				mensajePersonalizado("Periódo","Ocurrio un error","error",3000);
			}
		});
	});
}

function eliminar(){
	$("#tblPeriodos").on('click','#Eliminar',function(){
		var data = $("#tblPeriodos").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja el periódo: '+ data.nombre +'?',
		    icon: 'glyphicon glyphicon-question-sign',
		    hide: false,
		    confirm: {
		        confirm: true
		    },
		    buttons: {
		        closer: false,
		        sticker: false
		    },
		    history: {
		        history: false
		    }
		    })).get().on('pnotify.confirm', function(){
		    $.post('periodo/eliminar',{id:data.id},function(rpta){
				if (rpta.Estado == "Eliminado") 
				{
					$("#tblPeriodos").DataTable().draw().clear();
					mensajePersonalizado("Periódo","Periódo Eliminado Correctamente","success",3000);
				}else 
				{
					mensajePersonalizado("Periódo","Ocurrio un error","error",3000);
				}
			});
    	});
	});
}
