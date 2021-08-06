<?php

include_once realpath('../facade/Solicitud_horas_financiadoFacade.php');
include_once realpath('../facade/ContratoFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$nombre_proyecto = "Proyecto prueba";
$id_proyecto = "123";
$numero_contrato = "contrato";
$fecha_inicio = "2021-05-05";
$fecha_terminacion = "2021-05-05";
$fecha_ultimo_informe = "2021-05-05";


//$nombre_proyecto = strip_tags($dataObject->nombre_proyecto);
//$id_proyecto = strip_tags($dataObject->id_proyecto);
//$numero_contrato = strip_tags($dataObject->numero_contrato);
//$fecha_inicio = strip_tags($dataObject->fecha_inicio);
//$fecha_terminacion = strip_tags($dataObject->fecha_terminacion);
//$fecha_ultimo_informe = strip_tags($dataObject->fecha_ultimo_informe);




    try {
        $id_contrato = ContratoFacade::insert_solicitud($numero_contrato, $fecha_inicio, $fecha_terminacion);
        if ($id_contrato > 0) {
            $id_Solicitud = Solicitud_horas_financiadoFacade::insert($nombre_proyecto, $id_proyecto, $id_contrato, $fecha_ultimo_informe);
            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\",\"id\":\"{$id_Solicitud}\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar \"}";
    }

