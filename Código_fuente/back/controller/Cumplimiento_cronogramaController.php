<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No es una cola ni es una pila, es tu proyecto que no compila  \\
include_once realpath('../facade/Cumplimiento_cronogramaFacade.php');


class Cumplimiento_cronogramaController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $objetivo = strip_tags($_POST['objetivo']);
        $actividades = strip_tags($_POST['actividades']);
        $estado = strip_tags($_POST['estado']);
        $semestre = strip_tags($_POST['semestre']);
        $id_informe_gestion_financiado = strip_tags($_POST['id_informe_gestion_financiado']);
        Cumplimiento_cronogramaFacade::insert($id, $objetivo, $actividades, $estado, $semestre, $id_informe_gestion_financiado);
return true;
    }

    public static function listAll(){
        $list=Cumplimiento_cronogramaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Cumplimiento_cronograma) {	
	       $rta.="{
	    \"id\":\"{$Cumplimiento_cronograma->getid()}\",
	    \"objetivo\":\"{$Cumplimiento_cronograma->getobjetivo()}\",
	    \"actividades\":\"{$Cumplimiento_cronograma->getactividades()}\",
	    \"estado\":\"{$Cumplimiento_cronograma->getestado()}\",
	    \"semestre\":\"{$Cumplimiento_cronograma->getsemestre()}\",
	    \"id_informe_gestion_financiado\":\"{$Cumplimiento_cronograma->getid_informe_gestion_financiado()}\"
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