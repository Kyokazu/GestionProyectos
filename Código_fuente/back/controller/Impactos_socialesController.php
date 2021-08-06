<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    A vote for Bart is a vote for Anarchy!  \\
include_once realpath('../facade/Impactos_socialesFacade.php');


class Impactos_socialesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $impacto_1 = strip_tags($_POST['impacto_1']);
        $impacto_2 = strip_tags($_POST['impacto_2']);
        $impacto_3 = strip_tags($_POST['impacto_3']);
        $impacto_4 = strip_tags($_POST['impacto_4']);
        $impacto_5 = strip_tags($_POST['impacto_5']);
        $impacto_6 = strip_tags($_POST['impacto_6']);
        $impacto_7 = strip_tags($_POST['impacto_7']);
        $id_informe_gestion_financiado = strip_tags($_POST['id_informe_gestion_financiado']);
        Impactos_socialesFacade::insert($id, $impacto_1, $impacto_2, $impacto_3, $impacto_4, $impacto_5, $impacto_6, $impacto_7, $id_informe_gestion_financiado);
return true;
    }

    public static function listAll(){
        $list=Impactos_socialesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Impactos_sociales) {	
	       $rta.="{
	    \"id\":\"{$Impactos_sociales->getid()}\",
	    \"impacto_1\":\"{$Impactos_sociales->getimpacto_1()}\",
	    \"impacto_2\":\"{$Impactos_sociales->getimpacto_2()}\",
	    \"impacto_3\":\"{$Impactos_sociales->getimpacto_3()}\",
	    \"impacto_4\":\"{$Impactos_sociales->getimpacto_4()}\",
	    \"impacto_5\":\"{$Impactos_sociales->getimpacto_5()}\",
	    \"impacto_6\":\"{$Impactos_sociales->getimpacto_6()}\",
	    \"impacto_7\":\"{$Impactos_sociales->getimpacto_7()}\",
	    \"id_informe_gestion_financiado\":\"{$Impactos_sociales->getid_informe_gestion_financiado()}\"
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