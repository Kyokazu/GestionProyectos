<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\
include_once realpath('../facade/Tipo_publicacionesFacade.php');


class Tipo_publicacionesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $estado = strip_tags($_POST['estado']);
        Tipo_publicacionesFacade::insert($id, $descripcion, $estado);
return true;
    }

    public static function listAll(){
        $list=Tipo_publicacionesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Tipo_publicaciones) {	
	       $rta.="{
	    \"id\":\"{$Tipo_publicaciones->getid()}\",
	    \"descripcion\":\"{$Tipo_publicaciones->getdescripcion()}\",
	    \"estado\":\"{$Tipo_publicaciones->getestado()}\"
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