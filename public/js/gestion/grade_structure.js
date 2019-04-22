function configurarTablaSubNotas () {
	$('#tblSubNotas').dataTable().fnDestroy();
	$("#tblSubNotas").dataTable({
		'proccessing':true,
		'serverSide':true,
		'ajax':'notaestructura/listar',
		'columns':[
			{'data':'id','visible':false},
			{'data':'nombre','sWidth':'90%'},
			{'defaultContent':"<button type='button' id='EditarS' class='btn btn-success' style='padding: 4px 10px;margin: 2px;' ><i class='fa fa-pencil-square-o'></i></button><button type='button' id='Eliminar' style='padding: 4px 10px;' class='btn btn-danger'><i class='fa fa-trash-o'></i></button>",'sWidth':'10%'}
		]
	});
}

function mostrarFormSubNota() {
	$("#tblNotas").on('click', '#Estructura', function() {
		var data = $("#tblNotas").dataTable().fnGetData($(this).closest('tr'));
		$.post('notaestructura/sesion',{id:data.id},function(rpta){
			if(rpta.Sesion == "Asignado"){
				$('#myTab a[href="#tab_3"]').tab('show');
				//$("#Tab3").show();
				document.getElementById('NombreNota').textContent = rpta.NombreNota;
				configurarTablaSubNotas();
			}else {
				mensajePersonalizado("Nota","Ocurrio un error","error",3000);
			}
		});
	});
}

function insertarSubNota(){
	//$("#EnviarForm").click(function(){
		$.post('notaestructura/insertar', $("#FormSubNota").serializeObject(),function(rpta) {
			if(rpta.Estado == "Registrado")
			{
				mensajePersonalizado("Sub Nota","Sub Nota Asignada Correctamente","success",3000);
			}
			else if(rpta.Estado == "Editado")
			{
				mensajePersonalizado("Sub Nota","Sub Nota Editada Correctamente","success",3000);
			}
			else{
				mensajePersonalizado("Sub Nota","Ocurrio un error","error",3000);
			}
			$("#AccionSubNota").val('RegistrarSubNota');
			limpiarForm('FormSubNota');
			$("#tblSubNotas").DataTable().draw().clear();

		});
	//});
}

function eliminarSubNota(){
	$("#tblSubNotas").on('click','#Eliminar',function(){
		var data = $("#tblSubNotas").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja la sub nota: '+ data.nombre +'?',
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
		    $.post('notaestructura/eliminar',{id:data.id},function(rpta){
				if (rpta.Estado == "Eliminado")
				{
					$("#tblSubNotas").DataTable().draw().clear();
					mensajePersonalizado("Sub Nota","Sub Nota Eliminado Correctamente","success",3000);
				}else
				{
					mensajePersonalizado("Sub Nota","Ocurrio un error","error",3000);
				}
			});
    	});
	});
}

function viewDataSubNota(){
	$("#tblSubNotas").on('click','#EditarS',function(){
		var data = $("#tblSubNotas").dataTable().fnGetData($(this).closest('tr'));
		$.post('notaestructura/sesion/structure',{id:data.id},function(rpta){
			if(rpta.Sesion == "Asignado"){
				$("#NombreSubNota").val(data.nombre);
				$("#AccionSubNota").val('EditarSubNota');
			}else {
				mensajePersonalizado("Nota","Ocurrio un error","error",3000);
			}
		});
	});
}
