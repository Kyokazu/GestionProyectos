<?php

include_once realpath('../facade/Informes_gestion_financiadoFacade.php');
include_once realpath('../facade/Uso_equiposFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$list = Informes_gestion_financiadoFacade::listAll();
$list2 = Uso_equiposFacade::listAll();

$id_soli = strip_tags($dataObject->id_solicitud);

$rta = "";

foreach ($list as $obj => $Informes_gestion_financiadoFacade) {
    $id_sol = $Informes_gestion_financiadoFacade->getId();
    if ($id_soli == $id_sol) {
        foreach ($list2 as $obj => $Uso_equiposFacade) {
            if ($Uso_equiposFacade->getId_informe_gestion_financiado() == $id_sol) {
                $rta .= "{
            \"equipo\":\"{$Uso_equiposFacade->getEquipo()}\",
            \"proyecto\":\"{$Uso_equiposFacade->getProyecto()}\",
            \"otro_proyecto\":\"{$Uso_equiposFacade->getOtro_proyecto()}\",
            \"uso_posterior\":\"{$Uso_equiposFacade->getUso_posterior()}\"
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
