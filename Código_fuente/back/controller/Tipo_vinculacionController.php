<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya no la quiero, es cierto, pero tal vez la quiero. Es tan corto el amor, y es tan largo el olvido.  \\
include_once realpath('../facade/Tipo_vinculacionFacade.php');


class Tipo_vinculacionController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        Tipo_vinculacionFacade::insert($id, $descripcion);
return true;
    }

    public static function listAll(){
        $list=Tipo_vinculacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Tipo_vinculacion) {	
	       $rta.="{
	    \"id\":\"{$Tipo_vinculacion->getid()}\",
	    \"descripcion\":\"{$Tipo_vinculacion->getdescripcion()}\"
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