<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    404 Frase no encontrada  \\
include_once realpath('../facade/Actividades_fueraFacade.php');


class Actividades_fueraController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $Proyectos_id = strip_tags($_POST['proyectos_id']);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        Actividades_fueraFacade::insert($id, $descripcion, $proyectos);
return true;
    }

    public static function listAll(){
        $list=Actividades_fueraFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Actividades_fuera) {	
	       $rta.="{
	    \"id\":\"{$Actividades_fuera->getid()}\",
	    \"descripcion\":\"{$Actividades_fuera->getdescripcion()}\",
	    \"proyectos_id_id\":\"{$Actividades_fuera->getproyectos_id()->getid()}\"
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