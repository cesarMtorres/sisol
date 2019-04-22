$(document).ready(function(){

  if (localStorage.getItem('idPeriodoSeleccionado') != null || localStorage.getItem('idPeriodoSeleccionado') != "")
  	$("#PeriodosCb").val(localStorage.getItem('idPeriodoSeleccionado'));

	$("#PeriodosCb").on('change',function(){
		localStorage.setItem('idPeriodoSeleccionado', $(this).val());
	});


	$(".btn-list-grades").on('click',function(){
		var title = $(".modal-title");
		var id = $(this).data('id');
		var name = $(this).data('name');
		var div = '';
		title.html('Lista de Notas de ' + name);

		$.get('notaingreso/list/'+id,function(rpta){
			if(rpta.grades.length)
			{
			for (var i = 0; i < rpta.grades.length; i++) {	
				div += 	'<div class="panel panel-primary">'+
				          '<div class="panel-heading">'+
				            '<span style="font-size: 16px;">'+
				              rpta.grades[i].nombre +
				            '</span>'+
				          '</div>'+
				            '<table class="table" id="Table-notas">'+ 
				              '<thead>'+ 
				                '<tr>'+ 
				                  '<th>Nombre Sub-Nota</th>'+ 
				                '</tr>'+ 
				              '</thead>'+ 
				                '<tbody>';
				    for (var j = 0; j < rpta.subgrades.length; j++){
				    	if(rpta.grades[i].id == rpta.subgrades[j].grade_id)
				    	{
				    		div +=  '<tr>'+ 
				                    '<td>'+
				                      '<a href="#" onclick="setIdStudents('+id+','+rpta.grades[i].id+','+rpta.subgrades[j].id+')">'+rpta.subgrades[j].nombre+'</a>'+
				                    '</td>'+ 
				                '</tr>';
				    	}
				    }            	
				div +=          '</tbody>'+ 
				              '</table>'+
				     	'</div>';
				}
			}else {
				div = '<div class="alert alert-warning alert-dismissible">'+
                  '<button type="button" class="close" data-dismiss="alert"'+ 
                    'aria-hidden="true">×</button>'+
                    '<h4><i class="icon fa fa-warning"></i> Advertencia!</h4>'+
                    'El curso seleccionado no tiene notas asociadas'+
                '</div>';
			}
			document.getElementById('listgrades').innerHTML = div;
		});

		var opc = localStorage.getItem('idPeriodoSeleccionado');
			if (opc == null || opc == ""){
				$("#viewError").show();
				$("#viewAdvertencia").hide();
			}
			else{
				$("#viewAdvertencia").show();
				$("#viewError").hide();
				$("#namePeriod").text($("option[value="+opc+"]").text());
			}
	});

});

function setIdStudents(idCourse,idGrade,id){
	var opc = localStorage.getItem('idPeriodoSeleccionado');
	if (opc == null || opc == ""){
		alert('No ha seleccionado ningun periódo para subir notas. Seleccione uno para continuar.');
	}
	else{
		localStorage.setItem('idSubGradeSeleccionado', id);
		location.href = "notaingreso/students/"+idCourse+"/"+idGrade;
	}
	
}
