<?php

function generarTexto($longitud) 
{
    $key = null;
    
    $pattern = "123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for( $i = 0; $i < $longitud; $i++ )
    { 
        $key .= $pattern{ rand(0,34) }." "; 
    } 
    
    return $key; 
} 

session_start();

$_SESSION['capt'] = generarTexto(8);
$cap = explode(" ", $_SESSION['capt']);
$_SESSION['captcha'] = $cap[0].$cap[1].$cap[2].$cap[3].$cap[4].$cap[5].$cap[6].$cap[7];

header("Content-Type: image/png");
$im = @imagecreate(290, 46);
$color_fondo = imagecolorallocate($im, 0, 140, 200);
$color_texto = imagecolorallocate($im, 255, 255, 255);
imagestring($im, 90, 50, 15, $cap[0], $color_texto);
imagestring($im, 90, 75, 15, $cap[1], $color_texto);
imagestring($im, 90, 100, 15, $cap[2], $color_texto);
imagestring($im, 90, 125, 15, $cap[3], $color_texto);
imagestring($im, 90, 150, 15, $cap[4], $color_texto);
imagestring($im, 90, 175, 15, $cap[5], $color_texto);
imagestring($im, 90, 200, 15, $cap[6], $color_texto);
imagestring($im, 90, 225, 15, $cap[7], $color_texto);
imagepng($im);
imagedestroy($im);
