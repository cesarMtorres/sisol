
function SoloLetras(e) 
{
    valor=document.getElementById("sms");
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8,9,37,39, 6,59]; //Es la validación del KeyCodes, que teclas recibe el campo de texto. el (punto . es 46 Y COMA , es el 44)

    tecla_especial = false;
    for(var i in especiales) 
    {
        if(key == especiales[i]) 
        {
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
    {
       // alert('SOLO LETRAS EN ESTE CAMPO. POR FAVOR.!');
       valor.innerHTML="SOLO LETRA EN ESTE CAMPO. PORFAVOR";
        return false;
    }else{
        valor.innerHTML="";
    }
   

}

function SoloNumeros(evt)
{
    valor=document.getElementById("sms");
    if(window.event)
    {//asignamos el valor de la tecla a keynum
        keynum = evt.keyCode; //IE
    }
    else
    {
        keynum = evt.which; //FF
    } 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
    if((keynum > 43 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 || keynum==9 || keynum==10 )
    {
        valor.innerHTML="";
        return true;
    }
    else
    {
        valor.innerHTML="SOLO NUMEROS EN ESTE CAMPO. PORFAVOR";
       // alert("SOLO PUEDES INGRESAR NUMEROS EN ESTE CAMPO.!"); 
        return false;
    }
}

function validateMail(idMail)
{
    //Creamos un objeto 
    object=document.formvalidado.getElementById(correo);
    valueForm=object.value;
 
    // Patron para el correo
    var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if(valueForm.search(patron)==0)
    {
        //Mail correcto
        object.style.color="#000";
        return;
    }
    //Mail incorrecto
    object.style.color="#f00";
}


function validarClave(fomulario)
{
if(fomulario.clave1.value != "" && (fomulario.clave1.value == fomulario.clave2.value))
{return true; }

else
{ 
    salida.innerHTML="CLAVES NO COINCIDEN";

return false; }
}

function Comprobar(){
        var form = document.getElementById("formulario"),
        salida = document.getElementById("miSalida");
     
    form.addEventListener("submit", function(event){
        event.preventDefault();
        
        salida.innerHTML = "Tienes que completar los siguientes campos:";
      
        var comodin = true,
            elementos = this.elements,
            total = elementos.length;
      
        for (var i = 0; i < total; i++){
            if (!elementos[i].value.length){
                salida.innerHTML += "<br />- " + elementos[i].name;
                elementos[i].className = "falta";
                comodin = false;
            }
            else{
                elementos[i].className = null;
            }
        }
      
        if (comodin){
            this.submit();
        }
        else{
            salida.style.display = "block";
        }
    }, false);


}


function calc() {

   
var fechacalcular = $('#fecha').val();
var fechafixed = fechacalcular.replace("/","-");
var fixing = moment(fechafixed).format("DD-MM-YYYY");
var today = moment();
var nac = moment(fixing,'DD-MM-YYYY');
var inputDate = moment(nac, 'DD-MM-YYYY');
//AÑOS
var birth= moment(nac).format("YYYY");
var tday= moment(today).format("YYYY");

//MESES
var birthmonth= moment(nac).format("MM-YYYY");
var tdaymonth= moment(today).format("MM-YYYY");
//DIAS
var birthday= moment(nac).format("MM-YYYY");
var tdayday= moment(today).format("MM-YYYY");

if(inputDate===today){
 var diff = today.diff(nac, 'hours');
 $('#eddad').val(diff);
console.log(diff+' hours old');
$('#tiempo').val('horas');
}


else if(birthmonth===tdaymonth){
 var diff = today.diff(nac, 'days');
 $('#eddad').val(diff);
 $('#tiempo').val('dias');
console.log(diff+' days old');

if (diff<=21){
  alert("LA EDAD ES MENOR A 21 AÑOS.!");
  document.getElementById("fecha").focus();
  return false;
}

}


else if(birth===tday){
 var diff = today.diff(nac, 'months');
 $('#eddad').val(diff);
 $('#tiempo').val('meses');
console.log(diff+' months old');

if (diff<=21){
  alert("LA EDAD ES MENOR A 21 AÑOS.!");
  document.getElementById("fecha").focus();
  return false;
}

}
else if(birth!=tday && today.diff(nac, 'months')<12 ){
 var diff = today.diff(nac, 'months');
 $('#eddad').val(diff);
 $('#tiempo').val('meses');
console.log(diff+' months old');

if (diff<=21){
  alert("LA EDAD ES MENOR A 21 AÑOS.!");
  document.getElementById("fecha").focus();
  return false;
}

}

else{
 var diff = today.diff(nac, 'years');
 $('#eddad').val(diff);
 $('#tiempo').val('años');
console.log(diff+' years old');

if (diff<=21){
  alert("LA EDAD ES MENOR A 21 AÑOS.!");
  document.getElementById("fecha").focus();
  return false;
}

}

}


function fun_submit(){
inp=document.getElementById('monto');
if(decimales(inp) !== true){
document.getElementById("sms").innerHTML = "DEBE LLEVAR 1 DECIMAL EJEMPLO(1,00)  DIGITOS EN EL MONTO";
  return false;
}else{
  document.getElementById("sms").innerHTML = "";
}

function dos_decimales(cadena){
var expresion=/^[0-9]+([,-.][0-9]+)?$/;
var resultado=expresion.test(cadena);
return resultado;
}

function decimales(cadena){
var expresion=/[0-9]+(\,[0-9][0-9])$/;
var resultado=expresion.test(cadena);
return resultado;
}

function validateDecimal(valor) {
    var RE = /^\d*(\.\d{1})?\d{0,1}$/;  
    if (RE.test(valor)) {
    var resultado=RE.test(cadena);
    return resultado;
    } else {
        return false;
    }
}

}