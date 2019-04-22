function configurarTabla () {
	$("#tblNotas").dataTable({
		'proccessing':true,
		'serverSide':true,
		'ajax':'nota/listar',
		'columns':[
			{'data':'id','visible':false},
			{'data':'curso_id','visible':false},
			{'data':'nombre','sWidth':'25%'},
			{'data':'descripcion','sWidth':'30%'},
			{'data':'curso','sWidth':'20%'},
			{'defaultContent':"<button type='button' id='Editar' class='btn btn-success' style='padding: 4px 10px;margin: 2px;' ><i class='fa fa-pencil-square-o'></i></button><button type='button' id='Eliminar' style='padding: 4px 10px;' class='btn btn-danger'><i class='fa fa-trash-o'></i></button><button type='button' id='Estructura' style='padding: 4px 10px;margin:3px;' class='btn btn-primary'><i class='fa fa-gear'></i></button>",'sWidth':'12%'}
		]
	});
}


function insertar(){
	//$("#Enviar").click(function(){
		$.post('nota/insertar', $("#FormNota").serializeObject(),function(rpta) {
			if(rpta.Estado == "Registrado")
			{
				mensajePersonalizado("Nota","Nota Creada Correctamente","success",3000);	
			}
			else if(rpta.Estado == "Editado")
			{
				mensajePersonalizado("Nota","Nota Editada Correctamente","success",3000);
			}
			else{
				mensajePersonalizado("Nota","Ocurrio un error","error",3000);
			}
			$("#Accion").val('Registrar');
			limpiarForm('FormNota');
			
			$("#Curso").val("");
			$("#tblNotas").DataTable().draw().clear();
		});
	//});
}

function viewData(){
	$("#tblNotas").on('click','#Editar',function(){
		var data = $("#tblNotas").dataTable().fnGetData($(this).closest('tr'));
		$.post('nota/sesion',{id:data.id},function(rpta){
			if(rpta.Sesion == "Asignado"){
				$('#myTab a[href="#tab_2"]').tab('show');
				$("#Nombre").val(data.nombre);
				$("#Descripcion").val(data.descripcion);
				$("#Curso").val(data.curso_id).trigger('change');
				$("#Accion").val('Editar');
			}else {
				mensajePersonalizado("Nota","Ocurrio un error","error",3000);
			}
		});
	});
}

function eliminar(){
	$("#tblNotas").on('click','#Eliminar',function(){
		var data = $("#tblNotas").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja la nota: '+ data.nombre +'?',
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
		    $.post('nota/eliminar',{id:data.id},function(rpta){
				if (rpta.Estado == "Eliminado") 
				{
					$("#tblNotas").DataTable().draw().clear();
					mensajePersonalizado("Nota","Nota Eliminado Correctamente","success",3000);
				}else 
				{
					mensajePersonalizado("Nota","Ocurrio un error","error",3000);
				}
			});
    	});
	});
}

