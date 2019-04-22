$(document).ready(function(){
	if ($('.main-sidebar').width() == 230) {
		$('.sidebar-toggle').trigger('click');
	}

    $(".btn-salir").on('click',function() {
        localStorage.removeItem('idSeleccionado');
        localStorage.removeItem('idPeriodoSeleccionado');
        localStorage.removeItem('idSubGradeSeleccionado');
    });

});

function limpiarForm(id)
{
	document.getElementById(id).reset();
}

function mensajePersonalizado(titulo,texto,tipo,tiempo){
    new PNotify({
        title: titulo,
        text: texto,
        type: tipo,
        delay: tiempo
    });
}

function loading(contenedor)
{
  $("#"+contenedor).append('<center><img src="/img/loading.gif" width="70px" height="70px"></center>');
}

function loading2(contenedor)
{
  $("#"+contenedor).append('<img src="img/loading2.gif" width="90px" height="70px">');
}

function loading3(contenedor)
{
  $("#"+contenedor).append('<img src="img/loading3.gif" width="70px" height="60px" style="float:left;">');
}

function convertDate(date) {
  function pad(s) { return (s < 10) ? '0' + s : s; }
  var d = new Date(date);
  return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-');
}


