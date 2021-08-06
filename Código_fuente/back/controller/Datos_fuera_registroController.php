<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../facade/Datos_fuera_registroFacade.php');


class Datos_fuera_registroController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $producto = strip_tags($_POST['producto']);
        $descripcion = strip_tags($_POST['descripcion']);
        $responsable = strip_tags($_POST['responsable']);
        $fecha = strip_tags($_POST['fecha']);
        $Informe_gestion_semillero_id = strip_tags($_POST['informe_gestion_semillero_id']);
        $informe_gestion_semillero= new Informe_gestion_semillero();
        $informe_gestion_semillero->setId($Informe_gestion_semillero_id);
        Datos_fuera_registroFacade::insert($id, $producto, $descripcion, $responsable, $fecha, $informe_gestion_semillero);
return true;
    }

    public static function listAll(){
        $list=Datos_fuera_registroFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Datos_fuera_registro) {	
	       $rta.="{
	    \"id\":\"{$Datos_fuera_registro->getid()}\",
	    \"producto\":\"{$Datos_fuera_registro->getproducto()}\",
	    \"descripcion\":\"{$Datos_fuera_registro->getdescripcion()}\",
	    \"responsable\":\"{$Datos_fuera_registro->getresponsable()}\",
	    \"fecha\":\"{$Datos_fuera_registro->getfecha()}\",
	    \"informe_gestion_semillero_id_id\":\"{$Datos_fuera_registro->getinforme_gestion_semillero_id()->getid()}\"
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