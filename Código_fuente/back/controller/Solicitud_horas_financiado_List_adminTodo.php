<?php

include_once realpath('../facade/Solicitud_horas_financiadoFacade.php');
include_once realpath('../facade/InvestigadorFacade.php');


$list = Solicitud_horas_financiadoFacade::listAll2();
$list3 = InvestigadorFacade::listAll();

$rta = "";

foreach ($list as $obj => $Solicitud_horas_financiado) {
    foreach ($list3 as $obj => $Investigador) {
        if ($Solicitud_horas_financiado->getId() == $Investigador->getId_solicitud_horas_financiado()) {
            $rta .= "{       
	    \"id\":\"{$Solicitud_horas_financiado->getId()}\",
	    \"nombre_proyecto\":\"{$Solicitud_horas_financiado->getNombre_proyecto()}\",
	    \"fecha_solicitud\":\"{$Solicitud_horas_financiado->getFecha_solicitud()}\",
	    \"fecha_ultimo_informe\":\"{$Solicitud_horas_financiado->getFecha_ultimo_informe()}\",
            \"estado_solicitud\":\"{$Solicitud_horas_financiado->getEstado_solicitud()}\"
            \"nombre_investigador\":\"{$Investigador->getNombre_investigador()}\"
            \"horas_solicitadas\":\"{$Investigador->getHoras_semana()}\"
            \"tipo_investigador\":\"{$Investigador->getTipo_investigador()}\"
	       },";
        }
    }
}




if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"solicitudes\":[{$rta}]}";
} else {
    echo "{\"solicitudes\":[]}";
}
