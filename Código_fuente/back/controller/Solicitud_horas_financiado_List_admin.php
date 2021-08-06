<?php

include_once realpath('../facade/Solicitud_horas_financiadoFacade.php');
include_once realpath('../facade/ContratoFacade.php');

$list = Solicitud_horas_financiadoFacade::listAll2();
$rta = "";
foreach ($list as $obj => $Solicitud_horas_financiado) {
    $rta .= "{
	    \"id\":\"{$Solicitud_horas_financiado->getId()}\",
	    \"nombre_proyecto\":\"{$Solicitud_horas_financiado->getNombre_proyecto()}\",
	    \"fecha_solicitud\":\"{$Solicitud_horas_financiado->getFecha_solicitud()}\",
            \"estado_solicitud\":\"{$Solicitud_horas_financiado->getEstado_solicitud()}\"
	       },";
}


if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"solicitudes\":[{$rta}]}";
} else {
    echo "{\"solicitudes\":[]}";
}
