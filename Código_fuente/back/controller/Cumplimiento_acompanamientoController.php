<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\
include_once realpath('../facade/Cumplimiento_acompanamientoFacade.php');


class Cumplimiento_acompanamientoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre_joven = strip_tags($_POST['nombre_joven']);
        $nombre_tutor = strip_tags($_POST['nombre_tutor']);
        Cumplimiento_acompanamientoFacade::insert($id, $nombre_joven, $nombre_tutor);
return true;
    }

    public static function listAll(){
        $list=Cumplimiento_acompanamientoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Cumplimiento_acompanamiento) {	
	       $rta.="{
	    \"id\":\"{$Cumplimiento_acompanamiento->getid()}\",
	    \"nombre_joven\":\"{$Cumplimiento_acompanamiento->getnombre_joven()}\",
	    \"nombre_tutor\":\"{$Cumplimiento_acompanamiento->getnombre_tutor()}\"
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