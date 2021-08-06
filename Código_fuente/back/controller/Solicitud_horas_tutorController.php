<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\
include_once realpath('../facade/Solicitud_horas_tutorFacade.php');


class Solicitud_horas_tutorController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Docente_id = strip_tags($_POST['docente_id']);
        $docente= new Docente();
        $docente->setId($Docente_id);
        $nombre_convenio = strip_tags($_POST['nombre_convenio']);
        $grupo_investigacion = strip_tags($_POST['grupo_investigacion']);
        $nombre_propuesta = strip_tags($_POST['nombre_propuesta']);
        $Contrato_id = strip_tags($_POST['contrato_id']);
        $contrato= new Contrato();
        $contrato->setId($Contrato_id);
        $fecha_inicio_joven = strip_tags($_POST['fecha_inicio_joven']);
        $horas_solicitadas = strip_tags($_POST['horas_solicitadas']);
        Solicitud_horas_tutorFacade::insert($id, $docente, $nombre_convenio, $grupo_investigacion, $nombre_propuesta, $contrato, $fecha_inicio_joven, $horas_solicitadas);
return true;
    }

    public static function listAll(){
        $list=Solicitud_horas_tutorFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Solicitud_horas_tutor) {	
	       $rta.="{
	    \"id\":\"{$Solicitud_horas_tutor->getid()}\",
	    \"docente_id_id\":\"{$Solicitud_horas_tutor->getdocente_id()->getid()}\",
	    \"nombre_convenio\":\"{$Solicitud_horas_tutor->getnombre_convenio()}\",
	    \"grupo_investigacion\":\"{$Solicitud_horas_tutor->getgrupo_investigacion()}\",
	    \"nombre_propuesta\":\"{$Solicitud_horas_tutor->getnombre_propuesta()}\",
	    \"contrato_id_id\":\"{$Solicitud_horas_tutor->getcontrato_id()->getid()}\",
	    \"fecha_inicio_joven\":\"{$Solicitud_horas_tutor->getfecha_inicio_joven()}\",
	    \"horas_solicitadas\":\"{$Solicitud_horas_tutor->gethoras_solicitadas()}\"
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