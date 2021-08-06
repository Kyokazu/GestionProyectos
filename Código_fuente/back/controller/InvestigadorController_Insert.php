<?php

include_once realpath('../facade/InvestigadorFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$nombre_investigador = strip_tags($dataObject->nombre_investigador);
$horas_semana = strip_tags($dataObject->horas_semana);
$tipo_investigador = strip_tags($dataObject->tipo_investigador);
$id_solicitud_horas_financiado = strip_tags($dataObject->id_solicitud_horas_financiado);





try {
    $id_contrato = InvestigadorFacade::insertFOIN06($nombre_investigador, $horas_semana, $tipo_investigador, $id_solicitud_horas_financiado);

    if ($id_contrato > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado un investigador exitosamente\"}";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
}

