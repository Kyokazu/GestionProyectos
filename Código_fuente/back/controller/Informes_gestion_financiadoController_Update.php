<?php

include_once realpath('../facade/Informes_gestion_financiadoFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id_solicitud = strip_tags($dataObject->id_solicitud);

$rpta = Informes_gestion_financiadoFacade::update($id_solicitud);

echo "{\"mensaje\":\"Se ha dado el visto bueno exitosamente\"}";
