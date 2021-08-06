<?php

include_once realpath('../facade/Solicitud_horas_tutorFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$nombre_docente = strip_tags($dataObject->nombre_docente);
$nombre_convenio = strip_tags($dataObject->nombre_convenio);
$grupo_investigacion = strip_tags($dataObject->grupo_investigacion);
$nombre_propuesta = strip_tags($dataObject->nombre_propuesta);
$fecha_inicio_actividades = strip_tags($dataObject->fecha_inicio_actividades);
$horas_solicitadas = strip_tags($dataObject->horas_solicitadas);
$numero_acta = strip_tags($dataObject->numero_acta);
$condicion_investigador = strip_tags($dataObject->condicion_investigador);
$semestre_academico = strip_tags($dataObject->semestre_academico);




//valido 1 a 1  los campos vacios
if ($nombre_docente == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete todos los campos\"}";
} else {
    try {
        $id_contrato = Solicitud_horas_tutorFacade::insert($nombre_docente, $nombre_convenio, $grupo_investigacion, $nombre_propuesta, $fecha_inicio_actividades, $horas_solicitadas, $numero_acta, $condicion_investigador, $semestre_academico);

        if ($id_contrato > 0) {
            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
    }
}
