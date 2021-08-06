<?php


include_once realpath('../facade/UsuariosFacade.php');


$list = Solicitud_horas_tutorFacade::listAll();
$rta = "";
foreach ($list as $obj => $Solicitud_horas_financiado) {
    $rta .= "{
	    \"nombre_docente\":\"{$Solicitud_horas_financiado->getNombre_docente()}\",
	    \"nombre_convenio\":\"{$Solicitud_horas_financiado->getNombre_convenio()}\",
	    \"fecha_solicitud\":\"{$Solicitud_horas_financiado->getFecha_solicitud()}\",
            \"estado_solicitud\":\"{$Solicitud_horas_financiado->getEstado_solicitud()}\"
	       },";
}


if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"solicitudes\":[{$rta}]}";
} else {
    echo "{\"solicitudes\":[]}";
}


        $id = strip_tags($_POST['id']);
        $Persona_id = strip_tags($_POST['persona_id']);
        $persona= new Persona();
        $persona->setId($Persona_id);
        $password = strip_tags($_POST['password']);
        UsuariosFacade::insert($id, $persona, $password);
