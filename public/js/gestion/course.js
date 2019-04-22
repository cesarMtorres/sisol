function configurarTabla () {
	$("#tblCursos").dataTable({
		'proccessing':true,
		'serverSide':true,
		'ajax':'curso/listar',
		'columns':[
			{'data':'id','visible':false},
			{'data':'periodo_id','visible':false},
			{'data':'nombre'},
			{'data':'descripcion'},
			{'data':'periodo'},
			{'defaultContent':"<button type='button' id='Editar' class='btn btn-success' style='padding: 4px 10px;margin: 2px;' ><i class='fa fa-pencil-square-o'></i></button><button type='button' id='Eliminar' style='padding: 4px 10px;' class='btn btn-danger'><i class='fa fa-trash-o'></i></button>",'sWidth':'10%'}
		]
	});
}

function insertar(){
	//$("#Enviar").click(function(){
		$.post('curso/insertar', $("#FormCurso").serializeObject(),function(rpta) {
			if(rpta.Estado == "Registrado")
			{
				mensajePersonalizado("Curso","Curso Creado Correctamente","success",3000);	
			}
			else if(rpta.Estado == "Editado")
			{
				mensajePersonalizado("Curso","Curso Editado Correctamente","success",3000);
			}
			else{
				mensajePersonalizado("Curso","Ocurrio un error","error",3000);
			}
			$("#Accion").val('Registrar');
			limpiarForm('FormCurso');
			$("#tblCursos").DataTable().draw().clear();
		});
	//});
}

function viewData(){
	$("#tblCursos").on('click','#Editar',function(){
		var data = $("#tblCursos").dataTable().fnGetData($(this).closest('tr'));
		$.post('curso/sesion',{id:data.id},function(rpta){
			if(rpta.Sesion == "Asignado"){
				$('#myTab a[href="#tab_2"]').tab('show');
				$("#Nombre").val(data.nombre);
				$("#Descripcion").val(data.descripcion);
				$("#Accion").val('Editar');
			}else {
				mensajePersonalizado("Curso","Ocurrio un error","error",3000);
			}
		});
	});
}

function eliminar(){
	$("#tblCursos").on('click','#Eliminar',function(){
		var data = $("#tblCursos").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja el curso: '+ data.nombre +'?',
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
		    $.post('curso/eliminar',{id:data.id},function(rpta){
				if (rpta.Estado == "Eliminado") 
				{
					$("#tblCursos").DataTable().draw().clear();
					mensajePersonalizado("Curso","Curso Eliminado Correctamente","success",3000);
				}else 
				{
					mensajePersonalizado("Curso","Ocurrio un error","error",3000);
				}
			});
    	});
	});
}
