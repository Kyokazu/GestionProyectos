<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Dispongo de doce horas de adelanto, puedo de decárselas a ella  \\
include_once realpath('../facade/ContratoFacade.php');


class ContratoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $numero_contrato = strip_tags($_POST['numero_contrato']);
        $acta_comite = strip_tags($_POST['acta_comite']);
        $valor_financiado = strip_tags($_POST['valor_financiado']);
        $fecha_inicio = strip_tags($_POST['fecha_inicio']);
        $fecha_suspension = strip_tags($_POST['fecha_suspension']);
        $fecha_reinicio = strip_tags($_POST['fecha_reinicio']);
        $prorroga = strip_tags($_POST['prorroga']);
        $fecha_terminacion = strip_tags($_POST['fecha_terminacion']);
        $tiempo_ejecucion = strip_tags($_POST['tiempo_ejecucion']);
        $id_informe_gestion_financiado = strip_tags($_POST['id_informe_gestion_financiado']);
        ContratoFacade::insert($id, $numero_contrato, $acta_comite, $valor_financiado, $fecha_inicio, $fecha_suspension, $fecha_reinicio, $prorroga, $fecha_terminacion, $tiempo_ejecucion, $id_informe_gestion_financiado);
return true;
    }

    public static function listAll(){
        $list=ContratoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Contrato) {	
	       $rta.="{
	    \"id\":\"{$Contrato->getid()}\",
	    \"numero_contrato\":\"{$Contrato->getnumero_contrato()}\",
	    \"acta_comite\":\"{$Contrato->getacta_comite()}\",
	    \"valor_financiado\":\"{$Contrato->getvalor_financiado()}\",
	    \"fecha_inicio\":\"{$Contrato->getfecha_inicio()}\",
	    \"fecha_suspension\":\"{$Contrato->getfecha_suspension()}\",
	    \"fecha_reinicio\":\"{$Contrato->getfecha_reinicio()}\",
	    \"prorroga\":\"{$Contrato->getprorroga()}\",
	    \"fecha_terminacion\":\"{$Contrato->getfecha_terminacion()}\",
	    \"tiempo_ejecucion\":\"{$Contrato->gettiempo_ejecucion()}\",
	    \"id_informe_gestion_financiado\":\"{$Contrato->getid_informe_gestion_financiado()}\"
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