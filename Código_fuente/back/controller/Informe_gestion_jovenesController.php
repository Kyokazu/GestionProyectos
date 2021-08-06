<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando Gregorio Samsa se despertó una mañana después de un sueño intranquilo, se encontró sobre su cama convertido en un monstruoso insecto.  \\
include_once realpath('../facade/Informe_gestion_jovenesFacade.php');


class Informe_gestion_jovenesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $facultad = strip_tags($_POST['facultad']);
        $grupo_investigacion = strip_tags($_POST['grupo_investigacion']);
        $departamento = strip_tags($_POST['departamento']);
        $nombre_tutor = strip_tags($_POST['nombre_tutor']);
        $linea_investigacion = strip_tags($_POST['linea_investigacion']);
        $nombre_joven = strip_tags($_POST['nombre_joven']);
        $convenio_colciencias = strip_tags($_POST['convenio_colciencias']);
        $numero_convocatoria = strip_tags($_POST['numero_convocatoria']);
        $periodo_tutoria = strip_tags($_POST['periodo_tutoria']);
        Informe_gestion_jovenesFacade::insert($id, $facultad, $grupo_investigacion, $departamento, $nombre_tutor, $linea_investigacion, $nombre_joven, $convenio_colciencias, $numero_convocatoria, $periodo_tutoria);
return true;
    }

    public static function listAll(){
        $list=Informe_gestion_jovenesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Informe_gestion_jovenes) {	
	       $rta.="{
	    \"id\":\"{$Informe_gestion_jovenes->getid()}\",
	    \"facultad\":\"{$Informe_gestion_jovenes->getfacultad()}\",
	    \"grupo_investigacion\":\"{$Informe_gestion_jovenes->getgrupo_investigacion()}\",
	    \"departamento\":\"{$Informe_gestion_jovenes->getdepartamento()}\",
	    \"nombre_tutor\":\"{$Informe_gestion_jovenes->getnombre_tutor()}\",
	    \"linea_investigacion\":\"{$Informe_gestion_jovenes->getlinea_investigacion()}\",
	    \"nombre_joven\":\"{$Informe_gestion_jovenes->getnombre_joven()}\",
	    \"convenio_colciencias\":\"{$Informe_gestion_jovenes->getconvenio_colciencias()}\",
	    \"numero_convocatoria\":\"{$Informe_gestion_jovenes->getnumero_convocatoria()}\",
	    \"periodo_tutoria\":\"{$Informe_gestion_jovenes->getperiodo_tutoria()}\"
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