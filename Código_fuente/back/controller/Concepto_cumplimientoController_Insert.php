<?php

include_once realpath('../facade/Concepto_cumplimientoFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id_proyecto = strip_tags($dataObject->id_proyecto);
$nombre_investigador = strip_tags($dataObject->nombre_investigador);
$nombre_proyecto = strip_tags($dataObject->nombre_proyecto);
$tipo_investigador = strip_tags($dataObject->tipo_investigador);



//valido 1 a 1  los campos vacios
if ($nombre_investigador == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete todos los campos\"}";
} else {
    try {
        $rta = Concepto_cumplimientoFacade::insert($id_proyecto, $nombre_investigador, $nombre_proyecto, $tipo_investigador);
        if ($rta > 0) {
            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
    }
}
