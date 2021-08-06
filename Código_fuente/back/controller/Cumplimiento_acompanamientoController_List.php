<?php

include_once realpath('../facade/Cumplimiento_acompanamientoFacade.php');




$list = Cumplimiento_acompanamientoFacade::listAll();
$rta = "";
foreach ($list as $obj => $Cumplimiento_acompanamiento) {
    $rta .= "{
	    \"id\":\"{$Cumplimiento_acompanamiento->getId()}\",
	    \"nombre_tutor\":\"{$Cumplimiento_acompanamiento->getNombre_tutor()}\",
	    \"nombre_joven\":\"{$Cumplimiento_acompanamiento->getNombre_joven()}\",
            \"fecha_solicitud\":\"{$Cumplimiento_acompanamiento->getFecha_solicitud()}\",
            \"estado_solicitud\":\"{$Cumplimiento_acompanamiento->getEstado_solicitud()}\"
	       },";
}


if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"solicitudes\":[{$rta}]}";
} else {
    echo "{\"solicitudes\":[]}";
}
