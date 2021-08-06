<?php

include_once realpath('../facade/Informes_gestion_financiadoFacade.php');
include_once realpath('../facade/ContratoFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$list = Informes_gestion_financiadoFacade::listAll();
$list2 = ContratoFacade::listAll();

$id_soli = strip_tags($dataObject->id_solicitud);

$rta = "";

foreach ($list as $obj => $Informes_gestion_financiadoFacade) {
    $id_sol = $Informes_gestion_financiadoFacade->getId();
    if ($id_soli == $id_sol) {
        foreach ($list2 as $obj => $ContratoFacade) {
            if ($ContratoFacade->getId_informe_gestion_financiado() == $id_sol) {
                $rta .= "{
            \"numero_contrato\":\"{$ContratoFacade->getNumero_contrato()}\",
            \"acta_comite\":\"{$ContratoFacade->getActa_comite()}\",
            \"fecha_inicio\":\"{$ContratoFacade->getFecha_inicio()}\",
	    \"fecha_fin\":\"{$ContratoFacade->getFecha_terminacion()}\",
            \"fecha_suspension\":\"{$ContratoFacade->getFecha_suspension()}\",
            \"fecha_reinicio\":\"{$ContratoFacade->getFecha_Reinicio()}\",
            \"prorroga\":\"{$ContratoFacade->getProrroga()}\",
            \"tiempo_ejecucion\":\"{$ContratoFacade->getTiempo_ejecucion()}\",
            \"valor_financiado\":\"{$ContratoFacade->getValor_financiado()}\"
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
