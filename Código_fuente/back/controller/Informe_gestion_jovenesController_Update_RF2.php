<?php

include_once realpath('../facade/Informe_gestion_jovenesFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id_solicitud);

$rpta = Informe_gestion_jovenesFacade::update4($id);


echo "{\"mensaje\":\"Se ha rechazado la solicitud exitosamente\"}";