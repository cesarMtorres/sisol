$(document).ready(function(){
	getGradesStudents();

	$("#ListaSubNotas span").each(function(){
		var $span = $(this);
			if($span.data('id') == localStorage.getItem('idSubGradeSeleccionado'))
				$span.css('border','2px solid red');
	});

	$(".btn-save-grade").on('click',function(){
		$.post('/notaingreso/insertar',$("#FormNotas").serializeObject(),function(rpta){
			if(rpta.Estado == "Guardado")
				mensajePersonalizado("Notas","Notas Guardadas Correctamente","success",3000);	
			else
				mensajePersonalizado("Curso","Ocurrio un error","error",3000);
		});
	});

	$(".a-set-subgrade").on('click',function(){
		$("select").prop('selectedIndex', 0);
		$('.seleccionado').css('border','');

		var id = $(this).data('id');
		$(this).parent().css('border','2px solid red');
		
		localStorage.setItem('idSubGradeSeleccionado',id);
		
		getGradesStudents();
	});
});

function getGradesStudents(){
	var aux;
	document.getElementById('idSubGrade').value = localStorage.getItem('idSubGradeSeleccionado');
	document.getElementById('idPeriodo').value = localStorage.getItem('idPeriodoSeleccionado');
	$.get('/notaingreso/get/values/'+localStorage.getItem('idSubGradeSeleccionado')+'/'+localStorage.getItem('idPeriodoSeleccionado'),
		function(rpta){
		if(rpta.length)
		{
			for(var i = 0; i < rpta.length; i++) {
				aux = rpta[i].grade;
				if(aux < 10)
					aux = '0'+rpta[i].grade;
				document.getElementsByClassName('nt'+rpta[i].student_id)[0].value = aux;
			}
		}
	});
}
