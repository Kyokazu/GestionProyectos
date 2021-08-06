<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\
include_once realpath('../facade/Datos_Facade.php');


class Datos_Controller {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre_proyecto = strip_tags($_POST['nombre_proyecto']);
        $nombre_actividad = strip_tags($_POST['nombre_actividad']);
        $modalidad_participacion = strip_tags($_POST['modalidad_participacion']);
        $responsable = strip_tags($_POST['responsable']);
        $fecha_realizacion = strip_tags($_POST['fecha_realizacion']);
        $producto = strip_tags($_POST['producto']);
        $Semillero_id = strip_tags($_POST['semillero_id']);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        Datos_Facade::insert($id, $nombre_proyecto, $nombre_actividad, $modalidad_participacion, $responsable, $fecha_realizacion, $producto, $semillero);
return true;
    }

    public static function listAll(){
        $list=Datos_Facade::listAll();
        $rta="";
        foreach ($list as $obj => $Datos_) {	
	       $rta.="{
	    \"id\":\"{$Datos_->getid()}\",
	    \"nombre_proyecto\":\"{$Datos_->getnombre_proyecto()}\",
	    \"nombre_actividad\":\"{$Datos_->getnombre_actividad()}\",
	    \"modalidad_participacion\":\"{$Datos_->getmodalidad_participacion()}\",
	    \"responsable\":\"{$Datos_->getresponsable()}\",
	    \"fecha_realizacion\":\"{$Datos_->getfecha_realizacion()}\",
	    \"producto\":\"{$Datos_->getproducto()}\",
	    \"semillero_id_id\":\"{$Datos_->getsemillero_id()->getid()}\"
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