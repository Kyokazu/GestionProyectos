<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../facade/Concepto_cumplimientoFacade.php');


class Concepto_cumplimientoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $id_proyecto = strip_tags($_POST['id_proyecto']);
        $nombre_investigador = strip_tags($_POST['nombre_investigador']);
        $nombre_proyecto = strip_tags($_POST['nombre_proyecto']);
        $condicion_investigador = strip_tags($_POST['condicion_investigador']);
        Concepto_cumplimientoFacade::insert($id, $id_proyecto, $nombre_investigador, $nombre_proyecto, $condicion_investigador);
return true;
    }

    public static function listAll(){
        $list=Concepto_cumplimientoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Concepto_cumplimiento) {	
	       $rta.="{
	    \"id\":\"{$Concepto_cumplimiento->getid()}\",
	    \"id_proyecto\":\"{$Concepto_cumplimiento->getid_proyecto()}\",
	    \"nombre_investigador\":\"{$Concepto_cumplimiento->getnombre_investigador()}\",
	    \"nombre_proyecto\":\"{$Concepto_cumplimiento->getnombre_proyecto()}\",
	    \"condicion_investigador\":\"{$Concepto_cumplimiento->getcondicion_investigador()}\"
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