<?php

include_once realpath('../facade/Informes_gestion_financiadoFacade.php');
include_once realpath('../facade/Cumplimiento_objetivosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$list = Informes_gestion_financiadoFacade::listAll();
$list2 = Cumplimiento_objetivosFacade::listAll();

$id_soli = strip_tags($dataObject->id_solicitud);

$rta = "";

foreach ($list as $obj => $Informes_gestion_financiadoFacade) {
    $id_sol = $Informes_gestion_financiadoFacade->getId();
    if ($id_soli == $id_sol) {
        foreach ($list2 as $obj => $Cumplimiento_objetivosFacade) {
            if ($Cumplimiento_objetivosFacade->getId_informe_gestion_financiado() == $id_sol) {
                $rta .= "{
            \"objetivos_propuestos\":\"{$Cumplimiento_objetivosFacade->getObjetivos_propuestos()}\",
            \"actividades_propuestas\":\"{$Cumplimiento_objetivosFacade->getActividades_propuestas()}\",
            \"actividades_desarrolladas\":\"{$Cumplimiento_objetivosFacade->getActividades_desarrolladas()}\",
            \"logros_alcanzados\":\"{$Cumplimiento_objetivosFacade->getLogros_alcanzados()}\",
            \"porcentaje_cumplimiento\":\"{$Cumplimiento_objetivosFacade->getPorcentaje_cumplimiento()}\"
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
