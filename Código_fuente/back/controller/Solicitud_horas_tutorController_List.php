<?php

include_once realpath('../facade/Solicitud_horas_tutorFacade.php');



$list = Solicitud_horas_tutorFacade::listAll();
$rta = "";
foreach ($list as $obj => $Solicitud_horas_tutor) {
    $rta .= "{
	    \"nombre_docente\":\"{$Solicitud_horas_tutor->getNombre_docente()}\",
	    \"nombre_convenio\":\"{$Solicitud_horas_tutor->getNombre_convenio()}\",
	    \"fecha_solicitud\":\"{$Solicitud_horas_tutor->getFecha_solicitud()}\",
            \"vb_director_grupo\":\"{$Solicitud_horas_tutor->getVb_director_grupo()}\",
            \"vb_representante_facultad\":\"{$Solicitud_horas_tutor->getVb_representante_facultad()}\"
	       },";
}


if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"solicitudes\":[{$rta}]}";
} else {
    echo "{\"solicitudes\":[]}";
}
