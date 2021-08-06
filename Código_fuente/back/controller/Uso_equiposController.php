<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\
include_once realpath('../facade/Uso_equiposFacade.php');


class Uso_equiposController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $equipo = strip_tags($_POST['equipo']);
        $proyecto = strip_tags($_POST['proyecto']);
        $otro_proyecto = strip_tags($_POST['otro_proyecto']);
        $uso_posterior = strip_tags($_POST['uso_posterior']);
        $id_informe_gestion_financiado = strip_tags($_POST['id_informe_gestion_financiado']);
        Uso_equiposFacade::insert($id, $equipo, $proyecto, $otro_proyecto, $uso_posterior, $id_informe_gestion_financiado);
return true;
    }

    public static function listAll(){
        $list=Uso_equiposFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Uso_equipos) {	
	       $rta.="{
	    \"id\":\"{$Uso_equipos->getid()}\",
	    \"equipo\":\"{$Uso_equipos->getequipo()}\",
	    \"proyecto\":\"{$Uso_equipos->getproyecto()}\",
	    \"otro_proyecto\":\"{$Uso_equipos->getotro_proyecto()}\",
	    \"uso_posterior\":\"{$Uso_equipos->getuso_posterior()}\",
	    \"id_informe_gestion_financiado\":\"{$Uso_equipos->getid_informe_gestion_financiado()}\"
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