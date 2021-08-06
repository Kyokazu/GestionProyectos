<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...con el mayor de los disgustos, el benévolo señor Arciniegas.  \\
include_once realpath('../facade/PerfilesFacade.php');


class PerfilesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        PerfilesFacade::insert($id, $descripcion);
return true;
    }

    public static function listAll(){
        $list=PerfilesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Perfiles) {	
	       $rta.="{
	    \"id\":\"{$Perfiles->getid()}\",
	    \"descripcion\":\"{$Perfiles->getdescripcion()}\"
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