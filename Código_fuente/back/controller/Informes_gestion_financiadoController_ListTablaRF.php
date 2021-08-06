<?php

include_once realpath('../facade/Informes_gestion_financiadoFacade.php');
include_once realpath('../facade/ProyectosFacade.php');


$list = Informes_gestion_financiadoFacade::listAll();
$list2 = ProyectosFacade::listAll();

$rta = "";

foreach ($list as $obj => $Informes_gestion_financiadoFacade) {
    foreach ($list2 as $obj => $ProyectosFacade) {

        if ($Informes_gestion_financiadoFacade->getId_proyecto() == $ProyectosFacade->getId()) {
            $rta .= "{
            \"id\":\"{$Informes_gestion_financiadoFacade->getId()}\",
            \"nombre_proyecto\":\"{$ProyectosFacade->getTitulo()}\",
	    \"grupo_investigacion\":\"{$Informes_gestion_financiadoFacade->getGrupo_investigacion()}\",
	    \"facultad\":\"{$Informes_gestion_financiadoFacade->getFacultad()}\",
            \"estado_solicitud\":\"{$Informes_gestion_financiadoFacade->getEstado_solicitud()}\",
            \"fecha_solicitud\":\"{$Informes_gestion_financiadoFacade->getFecha_solicitud()}\"
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
