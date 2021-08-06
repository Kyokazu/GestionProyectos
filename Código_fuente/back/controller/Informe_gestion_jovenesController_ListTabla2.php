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
            \"nombre_tutor\":\"{$Informe_gestion_jovenesFacade->getNombre_tutor()}\",
            \"nombre_joven\":\"{$Informe_gestion_jovenesFacade->getNombre_joven()}\",
	    \"periodo_tutoria\":\"{$Informe_gestion_jovenesFacade->getPeriodo_tutoria()}\",
	    \"vb_director_grupo\":\"{$Informe_gestion_jovenesFacade->getVb_director_grupo()}\",
            \"vb_director_departamento\":\"{$Informe_gestion_jovenesFacade->getVb_director_departamento()}\",
            \"vb_representante_facultad\":\"{$Informe_gestion_jovenesFacade->getVb_representante_facultad()}\"
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
