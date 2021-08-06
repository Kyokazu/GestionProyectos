<?php

include_once realpath('../facade/Informes_gestion_financiadoFacade.php');
include_once realpath('../facade/Compromisos_equipoFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$list = Informes_gestion_financiadoFacade::listAll();
$list2 = Compromisos_equipoFacade::listAll();

$id_soli = strip_tags($dataObject->id_solicitud);

$rta = "";

foreach ($list as $obj => $Informes_gestion_financiadoFacade) {
    $id_sol = $Informes_gestion_financiadoFacade->getId();
    if ($id_soli == $id_sol) {
        foreach ($list2 as $obj => $Compromisos_equipoFacade) {
            if ($Compromisos_equipoFacade->getId_informe_gestion_financiado() == $id_sol) {
                $rta .= "{
            \"numero\":\"1\",
            \"estado\":\"{$Compromisos_equipoFacade->getEstado_1()}\",
            \"cantidad\":\"{$Compromisos_equipoFacade->getCantidad_1()}\"
                },";
                $rta .= "{
                \"numero\":\"2\",
            \"estado\":\"{$Compromisos_equipoFacade->getEstado_2()}\",
            \"cantidad\":\"{$Compromisos_equipoFacade->getCantidad_2()}\"
                },";
                $rta .= "{
                    \"numero\":\"3\",
            \"estado\":\"{$Compromisos_equipoFacade->getEstado_3()}\",
            \"cantidad\":\"{$Compromisos_equipoFacade->getCantidad_3()}\"
                },";
                $rta .= "{
                    \"numero\":\"4\",
            \"estado\":\"{$Compromisos_equipoFacade->getEstado_4()}\",
            \"cantidad\":\"{$Compromisos_equipoFacade->getCantidad_4()}\"
                },";
                $rta .= "{
                    \"numero\":\"5\",
            \"estado\":\"{$Compromisos_equipoFacade->getEstado_5()}\",
            \"cantidad\":\"{$Compromisos_equipoFacade->getCantidad_5()}\"
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
