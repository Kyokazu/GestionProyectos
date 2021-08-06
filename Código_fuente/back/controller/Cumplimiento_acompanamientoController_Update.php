<?php

include_once realpath('../facade/Cumplimiento_acompanamientoFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id_solicitud);

$rpta = Cumplimiento_acompanamientoFacade::update2($id);


echo "{\"mensaje\":\"Se ha dado el visto bueno exitosamente\"}";

