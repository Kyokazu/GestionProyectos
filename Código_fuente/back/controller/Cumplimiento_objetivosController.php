<?php

include_once realpath('../facade/Cumplimiento_objetivosFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id_proyecto = strip_tags($dataObject->id_proyecto);
$id_solicitud = strip_tags($dataObject->id_solicitud);
$control = strip_tags($dataObject->control);

$nombre_proyecto = strip_tags($dataObject->nombre_proyecto);
$numero_contrato = strip_tags($dataObject->numero_contrato);
$acta_comite = strip_tags($dataObject->acta_comite);
$facultad = strip_tags($dataObject->facultad);
$grupo_investigacion = strip_tags($dataObject->grupo_investigacion);
$representante_facultad = strip_tags($dataObject->representante_facultad);
$valor_financiado = strip_tags($dataObject->valor_financiado);
$duracion_proyecto = strip_tags($dataObject->duracion_proyecto);
$fecha_inicio = strip_tags($dataObject->fecha_inicio);
$fecha_terminacion = strip_tags($dataObject->fecha_terminacion);
$fecha_suspension = strip_tags($dataObject->fecha_suspension);
$fecha_reinicio = strip_tags($dataObject->fecha_reinicio);
$prorroga = strip_tags($dataObject->prorroga);
$tiempo_ejecucion = strip_tags($dataObject->tiempo_ejecucion);

$objetivos_propuestos = strip_tags($dataObject->objetivos_propuestos);
$actividades_propuestas = strip_tags($dataObject->actividades_propuestas);
$actividades_desarrolladas = strip_tags($dataObject->actividades_desarrolladas);
$logros_alcanzados = strip_tags($dataObject->logros_alcanzados);
$porcentaje_cumplimiento = strip_tags($dataObject->porcentaje_cumplimiento);
$cumplimiento_objetivoscol = strip_tags($dataObject->cumplimiento_objetivoscol);
$id_informe_gestion_financiado = strip_tags($dataObject->id_informe_gestion_financiado);




if ($numero_contrato == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete todos los campos\"}";
} else {
    try {

        if ($control == "No") {
            $id_solicitud2 = Informes_gestion_financiadoFacade::insert($id_proyecto, $grupo_investigacion, $facultad, $representante_facultad, $duracion_proyecto);
            $rta = ContratoFacade::insert($numero_contrato, $acta_comite, $valor_financiado, $fecha_inicio, $fecha_suspension, $fecha_reinicio, $prorroga, $fecha_terminacion, $tiempo_ejecucion, $id_solicitud2);
            Cumplimiento_objetivosFacade::insert($id, $objetivos_propuestos, $actividades_propuestas, $actividades_desarrolladas, $logros_alcanzados, $porcentaje_cumplimiento, $cumplimiento_objetivoscol, $id_informe_gestion_financiado);

            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\",\"id\":\"{$id_solicitud2}\"}";
        } else {
            Cumplimiento_objetivosFacade::insert($id, $objetivos_propuestos, $actividades_propuestas, $actividades_desarrolladas, $logros_alcanzados, $porcentaje_cumplimiento, $cumplimiento_objetivoscol, $id_informe_gestion_financiado);

            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\",\"id\":\"{$id_solicitud}\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
    }
}
    
