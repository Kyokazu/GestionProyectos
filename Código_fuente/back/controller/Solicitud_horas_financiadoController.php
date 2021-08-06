<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Has escuchado hablar del grandioso señor Arciniegas?  \\
include_once realpath('../facade/Solicitud_horas_financiadoFacade.php');


class Solicitud_horas_financiadoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $id_proyecto = strip_tags($_POST['id_proyecto']);
        $id_contrato = strip_tags($_POST['id_contrato']);
        Solicitud_horas_financiadoFacade::insert($id, $id_proyecto, $id_contrato);
return true;
    }

    public static function listAll(){
        $list=Solicitud_horas_financiadoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Solicitud_horas_financiado) {	
	       $rta.="{
	    \"id\":\"{$Solicitud_horas_financiado->getid()}\",
	    \"id_proyecto\":\"{$Solicitud_horas_financiado->getid_proyecto()}\",
	    \"id_contrato\":\"{$Solicitud_horas_financiado->getid_contrato()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        return "[{$msg},{$rta}]";
    }

}
//That`s all folks!