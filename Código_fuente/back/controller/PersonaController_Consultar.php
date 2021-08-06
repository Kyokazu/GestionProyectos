<?php

include_once realpath('../facade/PersonaFacade.php');
include_once realpath('../facade/PerfilesFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$correo = strip_tags($dataObject->correo);

$list = PersonaFacade::listAll2($correo);
$rta = "";

foreach ($list as $obj => $PersonaFacade) {
    $rta .= "{
	    \"id\":\"{$PersonaFacade->getPerfiles_id()}\",
	       },";
}
if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"id\":[{$rta}]}";
} else {
    echo "{\"id\":[]}";
}
