<?php

include_once realpath('../facade/Solicitud_horas_financiadoFacade.php');
include_once realpath('../facade/ContratoFacade.php');

$list = Solicitud_horas_financiadoFacade::listAll();
$rta = "";


foreach ($list as $obj => $Solicitud_horas_financiado) {
    $rta .= "{
            \"nombre_proyecto\":\"{$Solicitud_horas_financiado->getNombre_proyecto()}\",
	    \"fecha_solicitud\":\"{$Solicitud_horas_financiado->getFecha_solicitud()}\",
            \"vb_director_grupo\":\"{$Solicitud_horas_financiado->getVb_director_grupo()}\",
            \"vb_representante_facultad\":\"{$Solicitud_horas_financiado->getVb_representante_facultad()}\"
	       },";
}
if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"solicitudes\":[{$rta}]}";
} else {
    echo "{\"solicitudes\":[]}";
}
