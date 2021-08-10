<?php

include_once realpath('../facade/UsuariosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$correo = strip_tags($dataObject->correo);
$clave = strip_tags($dataObject->clave);
/* $correo = 'shirleypaolanv@ufps.edu.co'; */
//$clave = 'password';
$clave = md5($clave);

$rta = "";

$list = UsuariosFacade::login($correo, $clave);


if($correo != ""){
    foreach ($list as $obj => $UsuariosFacade) {
    echo $UsuariosFacade->getCorreo();
    $rta .= "{
	    \"correo\":\"{$UsuariosFacade->getCorreo()}\"
	       },";
}

echo "{\"usuario\":[{$rta}]}";


}







