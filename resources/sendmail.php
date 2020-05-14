<?php
	session_start();
if($modsolicitud->correo!='') {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_from = "pigeesfi2015@gmail.com";
$email_subject = "Contacto desde el sitio web";


// Aquí se deberían validar los datos ingresados por el usuario
if($modsolicitud->nombresol=='' ||
$modsolicitud->correo=='' ||
$modsolicitud->cedula=='' ||
$modsolicitud->comentario=='' ) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_to = $modsolicitud->mailtos; //"rovermonserrat@gmail.com"; //$_POST['email'];

//$email_to = "rovermonserrat@gmail.com";
//echo $email_to;
//die();

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Cédula: " . $modsolicitud->cedula . "\n";
$email_message .= "Nombre y Apellido: " . $modsolicitud->nombresol . "\n";
$email_message .= "Correo-e: " . $modsolicitud->correo . "\n";
$email_message .= "Espacio Físico Solicitado: " . $modsolicitud->codespfis . " - ". $modsolicitud->nomespfis . "\n\n";
$email_message .= "Comentarios: " . $modsolicitud->comentario . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
if (@mail($email_to, $email_subject, $email_message, $headers)){
	echo '<script type="text/javascript">';
	echo 'alert("¡El formulario se ha enviado con \u00E9xito!");';
	echo "</script>";
	//echo "¡El formulario se ha enviado con éxito!";
} else {
	echo '<script type="text/javascript">';
	echo 'alert("<p>Error en envio, consulte a su proveedor.</p>");';
	echo "</script>";
	//echo('<p>Error en envio, consulte a su proveedor.</p>');
}
}else{
	echo '<script type="text/javascript">';
	echo 'alert("<p>Error en envio, consulte a su proveedor.</p>");';
	echo "</script>";
 }
?>
