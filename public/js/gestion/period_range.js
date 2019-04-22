function configurarTabla () {
	$("#tblRangos").dataTable({
		'proccessing':true,
		'serverSide':true,
		'ajax':'rango/listar',
		'columns':[
			{'data':'id','visible':false},
			{'data':'periodo_id','visible':false},
			{'data':'nombre'},
			{'data':'duracion'},
			{'data':'fecha_inicio'},
			{'data':'fecha_fin'},
			{'data':'periodo'},
			{'defaultContent':"<button type='button' id='Editar' class='btn btn-success' style='padding: 4px 10px;margin: 2px;' ><i class='fa fa-pencil-square-o'></i></button><button type='button' id='Eliminar' style='padding: 4px 10px;' class='btn btn-danger'><i class='fa fa-trash-o'></i></button>",'sWidth':'10%'}
		]
	});
}

function insertar(){
		$.post('rango/insertar', $("#FormRango").serializeObject(),function(rpta) {
			if(rpta.Estado == "Registrado"){
				mensajePersonalizado("Rango","Rango Creado Correctamente","success",3000);	
				limpiarForm('FormRango');
			}else if(rpta.Estado == "Editado"){
				mensajePersonalizado("Rango","Rango Editado Correctamente","success",3000);
				limpiarForm('FormRango');
				$("#Accion").val('Registrar');
			}else if(rpta == "Limite"){
				mensajePersonalizado("Rango","La duración especificada ha superado el limite","error",3000);
			}else{
				mensajePersonalizado("Rango","Ocurrio un error","error",3000);
			}
			$("#tblRangos").DataTable().draw().clear();
		});
}

function viewData(){
	$("#tblRangos").on('click','#Editar',function(){
		var data = $("#tblRangos").dataTable().fnGetData($(this).closest('tr'));
		$.post('rango/sesion',{id:data.id},function(rpta){
			if(rpta.Sesion == "Asignado"){
				$('#myTab a[href="#tab_2"]').tab('show');
				$("#Nombre").val(data.nombre);
				$("#Duracion").val(data.duracion);
				$("#FechaInicio").val(data.fecha_inicio);
				$("#FechaFin").val(data.fecha_fin);
				$("#Accion").val('Editar');
			}else {
				mensajePersonalizado("Rango","Ocurrio un error","error",3000);
			}
		});
	});
}

function eliminar(){
	$("#tblRangos").on('click','#Eliminar',function(){
		var data = $("#tblRangos").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja el rango del periódo: '+ data.nombre +'?',
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
		    $.post('rango/eliminar',{id:data.id},function(rpta){
				if (rpta.Estado == "Eliminado") 
				{
					$("#tblRangos").DataTable().draw().clear();
					mensajePersonalizado("Rango","Rango Eliminado Correctamente","success",3000);
				}else 
				{
					mensajePersonalizado("Rango","Ocurrio un error","error",3000);
				}
			});
    	});
	});
}

