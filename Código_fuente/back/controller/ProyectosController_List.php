<?php

include_once realpath('../facade/ProyectosFacade.php');


$list = ProyectosFacade::listAll();
$rta = "";
foreach ($list as $obj => $Proyectos) {
    $rta .= "{
	    \"id\":\"{$Proyectos->getid()}\",
	    \"titulo\":\"{$Proyectos->gettitulo()}\"
	    },";
}

if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"proyectos\":[{$rta}]}";
} else {
    echo "{\"proyectos\":[]}";
}
