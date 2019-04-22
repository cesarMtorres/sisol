//$(document).ready(function(){
	//$("#btnSubir").click(function(){
function subirExcel() {
	var file = $('#Excel').prop('files')[0];
	var cursos = $("#Cursos").val();

	var fd = new FormData();    
	fd.append('excel', file);
	fd.append('Cursos',cursos);

	$.ajax({
		   	url:'subirexcel',
    		data : fd,
    		contentType: false,
			processData: false,
			type: 'POST',
			success: function(data){
				if (data.Estado == "Subido")
					mensajePersonalizado("Alumno","Alumnos Registrados Satisfactoriamente","success",3000);
				else if(data.Estado == "ErrorDatos")
					mensajePersonalizado("Alumno","No se han encontrado datos","error",3000);
				else 
					mensajePersonalizado("Alumno","Ocurrio un error. Reviselo el archivo antes de subirlo.","error",3000);		
				
				$("#LoadingExcel").html('');
				$(".js-example-programmatic-multi").select2().val(null).trigger("change");
				limpiarForm("FormAlumnoCursos");
				$("#tblAlumnos").DataTable().draw().clear();	
			}
	});
}
		
	//});
//});
