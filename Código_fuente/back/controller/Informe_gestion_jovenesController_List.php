<?php

include_once realpath('../facade/Informe_gestion_jovenesFacade.php');



$list = Informe_gestion_jovenesFacade::listAll();
$rta = "";

foreach ($list as $obj => $Informe_gestion_jovenesFacade) {


    $rta .= "{
            \"nombre_tutor\":\"{$Informe_gestion_jovenesFacade->getNombre_tutor()}\",
	    \"nombre_joven\":\"{$Informe_gestion_jovenesFacade->getNombre_joven()}\",
	    \"convenio_colciencias\":\"{$Informe_gestion_jovenesFacade->getConvenio_colciencias()}\",
            \"fecha_solicitud\":\"{$Informe_gestion_jovenesFacade->getFecha_solicitud()}\",
            \"vb_director_grupo\":\"{$Informe_gestion_jovenesFacade->getVb_director_grupo()}\",
            \"vb_director_departamento\":\"{$Informe_gestion_jovenesFacade->getVb_director_departamento()}\",
            \"vb_representante_facultad\":\"{$Informe_gestion_jovenesFacade->getVb_representante_facultad()}\"
	       },";
}





if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"solicitudes\":[{$rta}]}";
} else {
    echo "{\"solicitudes\":[]}";
}
