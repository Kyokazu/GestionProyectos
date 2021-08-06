<?php

include_once realpath('../facade/Concepto_cumplimientoFacade.php');


$list = Concepto_cumplimientoFacade::listAll();
$rta = "";
foreach ($list as $obj => $Concepto_cumplimiento) {
    $rta .= "{
	    \"nombre_proyecto\":\"{$Concepto_cumplimiento->getNombre_proyecto()}\",
	    \"nombre_investigador\":\"{$Concepto_cumplimiento->getNombre_investigador()}\",
            \"fecha_solicitud\":\"{$Concepto_cumplimiento->getFecha_solicitud()}\",
            \"vb_director_departamento\":\"{$Concepto_cumplimiento->getVb_director_departamento()}\",
            \"vb_representante_facultad\":\"{$Concepto_cumplimiento->getVb_representante_facultad()}\"
	       },";
}


if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"solicitudes\":[{$rta}]}";
} else {
    echo "{\"solicitudes\":[]}";
}
