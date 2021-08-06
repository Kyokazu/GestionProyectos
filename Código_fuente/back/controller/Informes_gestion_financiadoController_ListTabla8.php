<?php

include_once realpath('../facade/Informes_gestion_financiadoFacade.php');
include_once realpath('../facade/Impactos_socialesFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$list = Informes_gestion_financiadoFacade::listAll();
$list2 = Impactos_socialesFacade::listAll();

$id_soli = strip_tags($dataObject->id_solicitud);

$rta = "";

foreach ($list as $obj => $Informes_gestion_financiadoFacade) {
    $id_sol = $Informes_gestion_financiadoFacade->getId();
    if ($id_soli == $id_sol) {
        foreach ($list2 as $obj => $Impactos_socialesFacade) {
            if ($Impactos_socialesFacade->getId_informe_gestion_financiado() == $id_sol) {
                $rta .= "{
            \"numero\":\"1\",
            \"impacto\":\"{$Impactos_socialesFacade->getImpacto_1()}\"
                },";
                $rta .= "{
                \"numero\":\"2\",
                \"impacto\":\"{$Impactos_socialesFacade->getImpacto_2()}\"
                },";
                $rta .= "{
                    \"numero\":\"3\",
            \"impacto\":\"{$Impactos_socialesFacade->getImpacto_3()}\"
                },";
                $rta .= "{
                    \"numero\":\"4\",
            \"impacto\":\"{$Impactos_socialesFacade->getImpacto_4()}\"
                },";
                $rta .= "{
                    \"numero\":\"5\",
            \"impacto\":\"{$Impactos_socialesFacade->getImpacto_5()}\"
                },";
                $rta .= "{
                    \"numero\":\"6\",
            \"impacto\":\"{$Impactos_socialesFacade->getImpacto_6()}\"
                },";
                $rta .= "{
                    \"numero\":\"7\",
            \"impacto\":\"{$Impactos_socialesFacade->getImpacto_7()}\"
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
