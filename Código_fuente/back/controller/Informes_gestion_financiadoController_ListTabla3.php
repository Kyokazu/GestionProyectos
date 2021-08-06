<?php

include_once realpath('../facade/Informes_gestion_financiadoFacade.php');
include_once realpath('../facade/InvestigadorFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$list = Informes_gestion_financiadoFacade::listAll();
$list2 = InvestigadorFacade::listAll();

$id_soli = strip_tags($dataObject->id_solicitud);

$rta = "";

foreach ($list as $obj => $Informes_gestion_financiadoFacade) {
    $id_sol = $Informes_gestion_financiadoFacade->getId();
    if ($id_soli == $id_sol) {
        foreach ($list2 as $obj => $InvestigadorFacade) {
            if ($InvestigadorFacade->getId_informe_gestion_financiado() == $id_sol) {
                $rta .= "{
            \"nombre_investigador\":\"{$InvestigadorFacade->getNombre_investigador()}\",
            \"tipo_investigador\":\"{$InvestigadorFacade->getTipo_investigador()}\",
            \"horas_semana\":\"{$InvestigadorFacade->getHoras_semana()}\"
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
