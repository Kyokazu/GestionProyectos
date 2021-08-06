<?php

include_once realpath('../facade/Informe_gestion_jovenesFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$list = Informe_gestion_jovenesFacade::listAll();
$id_soli = strip_tags($dataObject->id_solicitud);
$rta = "";

foreach ($list as $obj => $Informe_gestion_jovenesFacade) {
    $id_sol = $Informe_gestion_jovenesFacade->getId();

    if ($id_sol === $id_soli) {
        $rta .= "{
            \"id\":\"{$Informe_gestion_jovenesFacade->getId()}\",
            \"facultad\":\"{$Informe_gestion_jovenesFacade->getFacultad()}\",
	    \"grupo_investigacion\":\"{$Informe_gestion_jovenesFacade->getGrupo_investigacion()}\",
	    \"departamento\":\"{$Informe_gestion_jovenesFacade->getDepartamento()}\",
            \"linea_investigacion\":\"{$Informe_gestion_jovenesFacade->getLinea_investigacion()}\",
            \"convenio_colciencias\":\"{$Informe_gestion_jovenesFacade->getConvenio_colciencias()}\",
            \"numero_convocatoria\":\"{$Informe_gestion_jovenesFacade->getNumero_convocatoria()}\",
            \"fecha_solicitud\":\"{$Informe_gestion_jovenesFacade->getFecha_solicitud()}\"
	       },";
    }
}

if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"solicitudes\":[{$rta}]}";
} else {
    echo "{\"solicitudes\":[]}";
}
