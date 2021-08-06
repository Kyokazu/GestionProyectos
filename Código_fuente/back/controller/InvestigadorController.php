<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\
include_once realpath('../facade/InvestigadorFacade.php');


class InvestigadorController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $tipo_investigador = strip_tags($_POST['tipo_investigador']);
        $horas_semana = strip_tags($_POST['horas_semana']);
        $id_solicitud_horas_financiado = strip_tags($_POST['id_solicitud_horas_financiado']);
        $id_informe_gestion_financiado = strip_tags($_POST['id_informe_gestion_financiado']);
        InvestigadorFacade::insert($id, $tipo_investigador, $horas_semana, $id_solicitud_horas_financiado, $id_informe_gestion_financiado);
return true;
    }

    public static function listAll(){
        $list=InvestigadorFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Investigador) {	
	       $rta.="{
	    \"id\":\"{$Investigador->getid()}\",
	    \"tipo_investigador\":\"{$Investigador->gettipo_investigador()}\",
	    \"horas_semana\":\"{$Investigador->gethoras_semana()}\",
	    \"id_solicitud_horas_financiado\":\"{$Investigador->getid_solicitud_horas_financiado()}\",
	    \"id_informe_gestion_financiado\":\"{$Investigador->getid_informe_gestion_financiado()}\"
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