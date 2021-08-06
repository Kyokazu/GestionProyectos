<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\
include_once realpath('../facade/Actividades_jovenesFacade.php');


class Actividades_jovenesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $actividades_desarrolladas = strip_tags($_POST['actividades_desarrolladas']);
        $productos_alcanzados = strip_tags($_POST['productos_alcanzados']);
        $semestre = strip_tags($_POST['semestre']);
        $id_informe_gestion_jovenes = strip_tags($_POST['id_informe_gestion_jovenes']);
        Actividades_jovenesFacade::insert($id, $actividades_desarrolladas, $productos_alcanzados, $semestre, $id_informe_gestion_jovenes);
return true;
    }

    public static function listAll(){
        $list=Actividades_jovenesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Actividades_jovenes) {	
	       $rta.="{
	    \"id\":\"{$Actividades_jovenes->getid()}\",
	    \"actividades_desarrolladas\":\"{$Actividades_jovenes->getactividades_desarrolladas()}\",
	    \"productos_alcanzados\":\"{$Actividades_jovenes->getproductos_alcanzados()}\",
	    \"semestre\":\"{$Actividades_jovenes->getsemestre()}\",
	    \"id_informe_gestion_jovenes\":\"{$Actividades_jovenes->getid_informe_gestion_jovenes()}\"
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