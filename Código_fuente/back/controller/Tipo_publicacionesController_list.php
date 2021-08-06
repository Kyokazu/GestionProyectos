<?php

include_once realpath('../facade/Tipo_publicacionesFacade.php');



$list = Tipo_publicacionesFacade::listAll();
$rta = "";
foreach ($list as $obj => $Tipo_publicaciones) {
    $rta .= "{
	    \"id\":\"{$Tipo_publicaciones->getid()}\",
	    \"descripcion\":\"{$Tipo_publicaciones->getdescripcion()}\"
	       },";
}


if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"publicaciones\":[{$rta}]}";
} else {
    echo "{\"publicaciones\":[]}";
}

