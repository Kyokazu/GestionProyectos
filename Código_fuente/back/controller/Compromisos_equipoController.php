<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo tengo un sueño. El sueño de que mis hijos vivan en un mundo con un único lenguaje de programación.  \\
include_once realpath('../facade/Compromisos_equipoFacade.php');


class Compromisos_equipoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $estado_1 = strip_tags($_POST['estado_1']);
        $cantidad_1 = strip_tags($_POST['cantidad_1']);
        $estado_2 = strip_tags($_POST['estado_2']);
        $cantidad_2 = strip_tags($_POST['cantidad_2']);
        $estado_3 = strip_tags($_POST['estado_3']);
        $cantidad_3 = strip_tags($_POST['cantidad_3']);
        $estado_4 = strip_tags($_POST['estado_4']);
        $cantidad_4 = strip_tags($_POST['cantidad_4']);
        $estado_5 = strip_tags($_POST['estado_5']);
        $cantidad_5 = strip_tags($_POST['cantidad_5']);
        $id_informe_gestion_financiado = strip_tags($_POST['id_informe_gestion_financiado']);
        Compromisos_equipoFacade::insert($id, $estado_1, $cantidad_1, $estado_2, $cantidad_2, $estado_3, $cantidad_3, $estado_4, $cantidad_4, $estado_5, $cantidad_5, $id_informe_gestion_financiado);
return true;
    }

    public static function listAll(){
        $list=Compromisos_equipoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Compromisos_equipo) {	
	       $rta.="{
	    \"id\":\"{$Compromisos_equipo->getid()}\",
	    \"estado_1\":\"{$Compromisos_equipo->getestado_1()}\",
	    \"cantidad_1\":\"{$Compromisos_equipo->getcantidad_1()}\",
	    \"estado_2\":\"{$Compromisos_equipo->getestado_2()}\",
	    \"cantidad_2\":\"{$Compromisos_equipo->getcantidad_2()}\",
	    \"estado_3\":\"{$Compromisos_equipo->getestado_3()}\",
	    \"cantidad_3\":\"{$Compromisos_equipo->getcantidad_3()}\",
	    \"estado_4\":\"{$Compromisos_equipo->getestado_4()}\",
	    \"cantidad_4\":\"{$Compromisos_equipo->getcantidad_4()}\",
	    \"estado_5\":\"{$Compromisos_equipo->getestado_5()}\",
	    \"cantidad_5\":\"{$Compromisos_equipo->getcantidad_5()}\",
	    \"id_informe_gestion_financiado\":\"{$Compromisos_equipo->getid_informe_gestion_financiado()}\"
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