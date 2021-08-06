<?php

include_once realpath('../facade/Informe_gestion_jovenesFacade.php');
include_once realpath('../facade/Actividades_jovenesFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id_proyecto = strip_tags($dataObject->id_proyecto);
$id_solicitud = strip_tags($dataObject->id_solicitud);
$control = strip_tags($dataObject->control);

$facultad = strip_tags($dataObject->facultad);
$grupo_investigacion = strip_tags($dataObject->grupo_investigacion);
$departamento = strip_tags($dataObject->departamento);
$nombre_tutor = strip_tags($dataObject->nombre_tutor);
$linea_investigacion = strip_tags($dataObject->linea_investigacion);
$nombre_joven = strip_tags($dataObject->nombre_joven);
$convenio_colciencias = strip_tags($dataObject->convenio_colciencias);
$numero_convocatoria = strip_tags($dataObject->numero_convocatoria);
$periodo_tutoria = strip_tags($dataObject->periodo_tutoria);

$semestre = strip_tags($dataObject->combo_semestre);
$actividades_desarrolladas = strip_tags($dataObject->actividades_desarrolladas);
$productos_alcanzados = strip_tags($dataObject->productos_alcanzados);


if ($nombre_joven == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete todos los campos\"}";
} else {
    try {
        if ($control == "No") {
            $id_solicitud2 = Informe_gestion_jovenesFacade::insert($facultad, $grupo_investigacion, $departamento, $nombre_tutor, $linea_investigacion, $nombre_joven, $convenio_colciencias, $numero_convocatoria, $periodo_tutoria);
            $rta1 = Actividades_jovenesFacade::insert($actividades_desarrolladas, $productos_alcanzados, $semestre, $id_solicitud2);
            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\",\"id\":\"{$id_solicitud2}\"}";
        } else {
            $rta1 = Actividades_jovenesFacade::insert($actividades_desarrolladas, $productos_alcanzados, $semestre, $id_solicitud);
            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\",\"id\":\"{$id_solicitud}\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
    }
}
    
