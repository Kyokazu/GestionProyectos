<?php

include_once realpath('../facade/Concepto_cumplimientoFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id = strip_tags($dataObject->id_solicitud);


$list = Concepto_cumplimientoFacade::listAll();
$rta = "";
foreach ($list as $obj => $Concepto_cumplimiento) {
    $idRet = $Concepto_cumplimiento->getId();
    if ($idRet == $id) {
        $rta .= "{
	    \"id\":\"{$Concepto_cumplimiento->getId()}\",
	    \"id_proyecto\":\"{$Concepto_cumplimiento->getId_proyecto()}\",
	    \"nombre_proyecto\":\"{$Concepto_cumplimiento->getNombre_proyecto()}\",
	    \"nombre_investigador\":\"{$Concepto_cumplimiento->getNombre_investigador()}\",
	    \"condicion_investigador\":\"{$Concepto_cumplimiento->getCondicion_investigador()}\",
	    \"vb_director_departamento\":\"{$Concepto_cumplimiento->getVb_director_departamento()}\",   
	    \"vb_representante_facultad\":\"{$Concepto_cumplimiento->getVb_representante_facultad()}\",
	    \"fecha_solicitud\":\"{$Concepto_cumplimiento->getFecha_Solicitud()}\"
	       },";
    }
}
if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"solicitud\":[{$rta}]}";
} else {
    echo "{\"solicitud\":[]}";
}
