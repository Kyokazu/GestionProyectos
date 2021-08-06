<?php

include_once realpath('../facade/Solicitud_horas_financiadoFacade.php');
include_once realpath('../facade/ContratoFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id = strip_tags($dataObject->id_solicitud);

$rpta = Solicitud_horas_financiadoFacade::update3($id);

try {
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha dado el visto bueno exitosamente\"}";
    }
} catch (Exception $e) {
     http_response_code(200);
        echo "{\"mensaje\":\"Se ha dado el visto bueno exitosamente\"}";
}


