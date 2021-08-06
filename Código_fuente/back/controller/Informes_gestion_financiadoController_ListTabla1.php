<?php

include_once realpath('../facade/Informes_gestion_financiadoFacade.php');
include_once realpath('../facade/ProyectosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$list = Informes_gestion_financiadoFacade::listAll();
$list2 = ProyectosFacade::listAll();

$id_soli = strip_tags($dataObject->id_solicitud);

$rta = "";

foreach ($list as $obj => $Informes_gestion_financiadoFacade) {
    $id_sol = $Informes_gestion_financiadoFacade->getId();
    foreach ($list2 as $obj => $ProyectosFacade) {
        if ($id_soli == $id_sol) {
            if ($Informes_gestion_financiadoFacade->getId_proyecto() == $ProyectosFacade->getId()) {
                $rta .= "{
            \"id\":\"{$ProyectosFacade->getId()}\",
            \"facultad\":\"{$Informes_gestion_financiadoFacade->getFacultad()}\",
            \"nombre_proyecto\":\"{$ProyectosFacade->getTitulo()}\",
	    \"grupo_investigacion\":\"{$Informes_gestion_financiadoFacade->getGrupo_investigacion()}\",
            \"duracion_proyecto\":\"{$Informes_gestion_financiadoFacade->getDuracion_proyecto()}\",
            \"fecha_solicitud\":\"{$Informes_gestion_financiadoFacade->getFecha_solicitud()}\"
	       },";
            }
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
