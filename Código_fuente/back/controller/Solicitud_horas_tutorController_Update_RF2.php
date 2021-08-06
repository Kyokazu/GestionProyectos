<?php

include_once realpath('../facade/Solicitud_horas_tutorFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id = strip_tags($dataObject->id_solicitud);

$rpta = Solicitud_horas_tutorFacade::update3($id);

echo "{\"mensaje\":\"Se ha rechazado la solicitud exitosamente\"}";

