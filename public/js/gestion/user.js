function configurarTabla () {
	$("#tblUsuarios").dataTable({
		'proccessing':true,
		'serverSide':true,
		'ajax':'usuario/listar',
		'columns':[
			{'data':'id','visible':false},
			{'data':'nombre'},
			{'data':'apellidos'},
			{'data':'direccion'},
			{'data':'email'},
			{'defaultContent':"<button type='button' id='Editar' class='btn btn-success' style='padding: 4px 10px;margin: 2px;' ><i class='fa fa-pencil-square-o'></i></button><button type='button' id='Eliminar' style='padding: 4px 10px;margin: 2px;' class='btn btn-danger'><i class='fa fa-trash-o'></i></button><button data-toggle='modal' data-target='#modalFoto' id='UploadFoto' class='btn btn-info' style='padding: 4px 10px;'><i class='fa fa-camera'></i></button>",'sWidth':'12%'}
		]
	});
}

function insertar(){
		$.post('usuario/insertar', $("#FormUsuario").serializeObject(),function(rpta) {
			if(rpta.Estado == "Registrado")
			{
				mensajePersonalizado("Usuario","Usuario Creado Correctamente","success",3000);	
			}
			else if(rpta.Estado == "Editado")
			{
				mensajePersonalizado("Usuario","Usuario Editado Correctamente","success",3000);
			}
			else{
				mensajePersonalizado("Usuario","Ocurrio un error","error",3000);
			}
			$('#FormUsuario').bootstrapValidator('enableFieldValidators', 'Password', false);
			$("#Accion").val('Registrar');
			limpiarForm('FormUsuario');
			$("#tblUsuarios").DataTable().draw().clear();
		});
}

function viewData(){
	$("#tblUsuarios").on('click','#Editar',function(){
		var data = $("#tblUsuarios").dataTable().fnGetData($(this).closest('tr'));
		$.post('usuario/sesion',{id:data.id},function(rpta){
			if(rpta.Sesion == "Asignado"){
				$('#myTab a[href="#tab_2"]').tab('show');
				$("#Nombre").val(data.nombre);
				$("#Apellidos").val(data.apellidos);
				$("#Direccion").val(data.direccion);
				$("#Email").val(data.email);
				$("#Accion").val('Editar');
			}else {
				mensajePersonalizado("Usuario","Ocurrio un error","error",3000);
			}
		});
	});
}

function eliminar(){
	$("#tblUsuarios").on('click','#Eliminar',function(){
		var data = $("#tblUsuarios").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja el alumno: '+ data.nombre + ' ' + data.apellidos + '?',
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
		    $.post('usuario/eliminar',{id:data.id},function(rpta){
				if (rpta.Estado == "Eliminado") 
				{
					$("#tblUsuarios").DataTable().draw().clear();
					mensajePersonalizado("Usuario","Usuario Eliminado Correctamente","success",3000);
				}else 
				{
					mensajePersonalizado("Usuario","Ocurrio un error","error",3000);
				}
			});
    	});
	});
}

function subirFoto()
{
	$("#tblUsuarios").on('click','#UploadFoto',function(){
		var data = $("#tblUsuarios").dataTable().fnGetData($(this).closest('tr'));
		$.post('usuario/sesion',{id:data.id});
	})	
}

