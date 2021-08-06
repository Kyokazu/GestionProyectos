<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Hey ¿cómo se llama tu café internet?  \\
include_once realpath('../facade/Informe_gestion_semilleroFacade.php');


class Informe_gestion_semilleroController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $fecha = strip_tags($_POST['fecha']);
        $semestre = strip_tags($_POST['semestre']);
        $Capacitaciones_id = strip_tags($_POST['capacitaciones_id']);
        $capacitaciones= new Capacitaciones();
        $capacitaciones->setId($Capacitaciones_id);
        $Proyectos_id = strip_tags($_POST['proyectos_id']);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        Informe_gestion_semilleroFacade::insert($id, $fecha, $semestre, $capacitaciones, $proyectos);
return true;
    }

    public static function listAll(){
        $list=Informe_gestion_semilleroFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Informe_gestion_semillero) {	
	       $rta.="{
	    \"id\":\"{$Informe_gestion_semillero->getid()}\",
	    \"fecha\":\"{$Informe_gestion_semillero->getfecha()}\",
	    \"semestre\":\"{$Informe_gestion_semillero->getsemestre()}\",
	    \"capacitaciones_id_id\":\"{$Informe_gestion_semillero->getcapacitaciones_id()->getid()}\",
	    \"proyectos_id_id\":\"{$Informe_gestion_semillero->getproyectos_id()->getid()}\"
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