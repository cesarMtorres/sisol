function configurarTabla () {
	$("#tblAlumnos").dataTable({
		'proccessing':true,
		'serverSide':true,
		'ajax':'alumno/listar',
		'columns':[
			{'data':'id','visible':false},
			{'data':'nombre'},
			{'data':'apellidos'},
			{'data':'direccion'},
			{'data':'email'},
			{'defaultContent':"<button type='button' id='Editar' class='btn btn-success' style='padding: 4px 10px;margin: 2px;' ><i class='fa fa-pencil-square-o'></i></button><button type='button' id='Eliminar' style='padding: 4px 10px;margin: 2px;' class='btn btn-danger'><i class='fa fa-trash-o'></i></button>",'sWidth':'10%'}
		]
	});
}

function insertar(){
	//$("#Enviar").click(function(){
		$.post('alumno/insertar', $("#FormAlumno").serializeObject(),function(rpta) {
			if(rpta.Estado == "Registrado")
			{
				mensajePersonalizado("Alumno","Alumno Creado Correctamente","success",3000);	
			}
			else if(rpta.Estado == "Editado")
			{
				mensajePersonalizado("Alumno","Alumno Editado Correctamente","success",3000);
			}
			else{
				mensajePersonalizado("Alumno","Ocurrio un error","error",3000);
			}
			actualizarListaAlumnos();
			$("#Accion").val('Registrar');
			limpiarForm('FormAlumno');
			$("#tblAlumnos").DataTable().draw().clear();
		});
	//});
}

function viewData(){
	$("#tblAlumnos").on('click','#Editar',function(){
		var data = $("#tblAlumnos").dataTable().fnGetData($(this).closest('tr'));
		$.post('alumno/sesion',{id:data.id},function(rpta){
			if(rpta.Sesion == "Asignado"){
				$('#myTab a[href="#tab_2"]').tab('show');
				$("#Nombre").val(data.nombre);
				$("#Apellidos").val(data.apellidos);
				$("#Direccion").val(data.direccion);
				$("#Email").val(data.email);
				$("#Accion").val('Editar');
			}else {
				mensajePersonalizado("Alumno","Ocurrio un error","error",3000);
			}
		});
	});
}

function eliminar(){
	$("#tblAlumnos").on('click','#Eliminar',function(){
		var data = $("#tblAlumnos").dataTable().fnGetData($(this).closest('tr'));
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
		    $.post('alumno/eliminar',{id:data.id},function(rpta){
				if (rpta.Estado == "Eliminado") 
				{
					$("#tblAlumnos").DataTable().draw().clear();
					actualizarListaAlumnos();
					mensajePersonalizado("Alumno","Alumno Eliminado Correctamente","success",3000);
				}else 
				{
					mensajePersonalizado("Alumno","Ocurrio un error","error",3000);
				}
			});
    	});
	});
}

function subirFoto()
{
	$("#tblAlumnos").on('click','#UploadFoto',function(){
		var data = $("#tblAlumnos").dataTable().fnGetData($(this).closest('tr'));
		$.post('alumno/sesion',{id:data.id});
	})	
}


function mostrarConfiguracion()
{
	$('input[type=radio][name=r1]').change(function() {
		switch(this.value) {
			case "Individual":
				document.getElementById('Opcion').value= 'Individual';
				document.getElementById('AsignacionExcel').style.display = 'none';
				document.getElementById('AsignacionIndividual').style.display = 'block';
				break;
			case "Excel":
				document.getElementById('Opcion').value= 'Excel';
				document.getElementById('AsignacionIndividual').style.display = 'none';
				document.getElementById('AsignacionExcel').style.display = 'block';
				break;
			default:
				mensajePersonalizado("Alumno","Ocurrio un error","error",3000);
				break;
		}
	});	
}

function guardarRelacion () {
	
	$("#EnviarMultiple").click(function(){
		var opc = $("#Opcion").val();
		if (opc == "Excel") {
			subirExcel();
			loading2('LoadingExcel');
			$("#LoadingExcel").append('<span style="font-size:16px;">La operacion puede tardar unos segundos...</span>');
		}
		else if(opc == "Individual") guardarIndividual();
		else mensajePersonalizado("Alumno","Ocurrio un error","error",3000);
	});
}

function guardarIndividual(){
	$.post('alumno/asignar',$("#FormAlumnoCursos").serializeObject(),function(rpta){
		if(rpta.Estado == "Registrado")
		{
			mensajePersonalizado("Alumno","Alumno Asignado Correctamente","success",3000);	
		}
		else{
			mensajePersonalizado("Alumno","Ocurrio un error","error",3000);
		}
		$(".js-example-programmatic-multi").select2().val(null).trigger("change");
		$('#Estudiante').val($('#Estudiante option:first-child').val()).trigger('change');
		limpiarForm("FormAlumnoCursos");
	});
}

function actualizarListaAlumnos()
{
    $("#Estudiante").empty();
    $.get('alumnos',function(data){
        if(data.length)
        {
            for(var i=0; i<data.length; i++)
            {
                $("#Estudiante").append("<option value='"+data[i].id+"'>"+data[i].nombre+ ' ' +data[i].apellidos+"</option>");
            }
        }
    });
}
