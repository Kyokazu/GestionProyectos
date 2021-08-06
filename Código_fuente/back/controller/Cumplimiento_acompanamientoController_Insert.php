<?php

include_once realpath('../facade/Cumplimiento_acompanamientoFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$nombre_tutor = strip_tags($dataObject->nombre_tutor);
$nombre_joven = strip_tags($dataObject->nombre_joven);




//valido 1 a 1  los campos vacios

    try {
        $rta = Cumplimiento_acompanamientoFacade::insert($nombre_tutor, $nombre_joven);

        if ($rta > 0) {
            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
    }

