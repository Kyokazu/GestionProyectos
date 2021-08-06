<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\
include_once realpath('Actividades_jovenesController.php');
include_once realpath('Compromisos_equipoController.php');
include_once realpath('Concepto_cumplimientoController.php');
include_once realpath('ContratoController.php');
include_once realpath('Cumplimiento_acompanamientoController.php');
include_once realpath('Cumplimiento_cronogramaController.php');
include_once realpath('Cumplimiento_objetivosController.php');
include_once realpath('Estado_proyectoController.php');
include_once realpath('FacultadController.php');
include_once realpath('Grupo_investigacionController.php');
include_once realpath('Impactos_socialesController.php');
include_once realpath('Informe_gestion_jovenesController.php');
include_once realpath('Informes_gestion_financiadoController.php');
include_once realpath('InvestigadorController.php');
include_once realpath('Linea_investigacionController.php');
include_once realpath('ModulosController.php');
include_once realpath('PerfilesController.php');
include_once realpath('Solicitud_horasController.php');
include_once realpath('Solicitud_horas_financiadoController.php');
include_once realpath('Tipo_docuemntoController.php');
include_once realpath('Tipo_ponenciasController.php');
include_once realpath('Tipo_publicacionesController.php');
include_once realpath('Tipo_vinculacionController.php');
include_once realpath('Uso_equiposController.php');

$ruta = strip_tags($_POST['ruta']);
    	$rtn = "";
    	switch ($ruta) {
           case 'Actividades_jovenesInsert':
    			$rtn = Actividades_jovenesController::insert();
    			break;
    		case 'Actividades_jovenesList':
    			$rtn = Actividades_jovenesController::listAll();
    			break;
           case 'Compromisos_equipoInsert':
    			$rtn = Compromisos_equipoController::insert();
    			break;
    		case 'Compromisos_equipoList':
    			$rtn = Compromisos_equipoController::listAll();
    			break;
           case 'Concepto_cumplimientoInsert':
    			$rtn = Concepto_cumplimientoController::insert();
    			break;
    		case 'Concepto_cumplimientoList':
    			$rtn = Concepto_cumplimientoController::listAll();
    			break;
           case 'ContratoInsert':
    			$rtn = ContratoController::insert();
    			break;
    		case 'ContratoList':
    			$rtn = ContratoController::listAll();
    			break;
           case 'Cumplimiento_acompanamientoInsert':
    			$rtn = Cumplimiento_acompanamientoController::insert();
    			break;
    		case 'Cumplimiento_acompanamientoList':
    			$rtn = Cumplimiento_acompanamientoController::listAll();
    			break;
           case 'Cumplimiento_cronogramaInsert':
    			$rtn = Cumplimiento_cronogramaController::insert();
    			break;
    		case 'Cumplimiento_cronogramaList':
    			$rtn = Cumplimiento_cronogramaController::listAll();
    			break;
           case 'Cumplimiento_objetivosInsert':
    			$rtn = Cumplimiento_objetivosController::insert();
    			break;
    		case 'Cumplimiento_objetivosList':
    			$rtn = Cumplimiento_objetivosController::listAll();
    			break;
           case 'Estado_proyectoInsert':
    			$rtn = Estado_proyectoController::insert();
    			break;
    		case 'Estado_proyectoList':
    			$rtn = Estado_proyectoController::listAll();
    			break;
           case 'FacultadInsert':
    			$rtn = FacultadController::insert();
    			break;
    		case 'FacultadList':
    			$rtn = FacultadController::listAll();
    			break;
           case 'Grupo_investigacionInsert':
    			$rtn = Grupo_investigacionController::insert();
    			break;
    		case 'Grupo_investigacionList':
    			$rtn = Grupo_investigacionController::listAll();
    			break;
           case 'Impactos_socialesInsert':
    			$rtn = Impactos_socialesController::insert();
    			break;
    		case 'Impactos_socialesList':
    			$rtn = Impactos_socialesController::listAll();
    			break;
           case 'Informe_gestion_jovenesInsert':
    			$rtn = Informe_gestion_jovenesController::insert();
    			break;
    		case 'Informe_gestion_jovenesList':
    			$rtn = Informe_gestion_jovenesController::listAll();
    			break;
           case 'Informes_gestion_financiadoInsert':
    			$rtn = Informes_gestion_financiadoController::insert();
    			break;
    		case 'Informes_gestion_financiadoList':
    			$rtn = Informes_gestion_financiadoController::listAll();
    			break;
           case 'InvestigadorInsert':
    			$rtn = InvestigadorController::insert();
    			break;
    		case 'InvestigadorList':
    			$rtn = InvestigadorController::listAll();
    			break;
           case 'Linea_investigacionInsert':
    			$rtn = Linea_investigacionController::insert();
    			break;
    		case 'Linea_investigacionList':
    			$rtn = Linea_investigacionController::listAll();
    			break;
           case 'ModulosInsert':
    			$rtn = ModulosController::insert();
    			break;
    		case 'ModulosList':
    			$rtn = ModulosController::listAll();
    			break;
           case 'PerfilesInsert':
    			$rtn = PerfilesController::insert();
    			break;
    		case 'PerfilesList':
    			$rtn = PerfilesController::listAll();
    			break;
           case 'Solicitud_horasInsert':
    			$rtn = Solicitud_horasController::insert();
    			break;
    		case 'Solicitud_horasList':
    			$rtn = Solicitud_horasController::listAll();
    			break;
           case 'Solicitud_horas_financiadoInsert':
    			$rtn = Solicitud_horas_financiadoController::insert();
    			break;
    		case 'Solicitud_horas_financiadoList':
    			$rtn = Solicitud_horas_financiadoController::listAll();
    			break;
           case 'Tipo_docuemntoInsert':
    			$rtn = Tipo_docuemntoController::insert();
    			break;
    		case 'Tipo_docuemntoList':
    			$rtn = Tipo_docuemntoController::listAll();
    			break;
           case 'Tipo_ponenciasInsert':
    			$rtn = Tipo_ponenciasController::insert();
    			break;
    		case 'Tipo_ponenciasList':
    			$rtn = Tipo_ponenciasController::listAll();
    			break;
           case 'Tipo_publicacionesInsert':
    			$rtn = Tipo_publicacionesController::insert();
    			break;
    		case 'Tipo_publicacionesList':
    			$rtn = Tipo_publicacionesController::listAll();
    			break;
           case 'Tipo_vinculacionInsert':
    			$rtn = Tipo_vinculacionController::insert();
    			break;
    		case 'Tipo_vinculacionList':
    			$rtn = Tipo_vinculacionController::listAll();
    			break;
           case 'Uso_equiposInsert':
    			$rtn = Uso_equiposController::insert();
    			break;
    		case 'Uso_equiposList':
    			$rtn = Uso_equiposController::listAll();
    			break;
    		default:
    			$rtn="404 Ruta no encontrada.";
    			break;
    	}

echo $rtn;

//That`s all folks!