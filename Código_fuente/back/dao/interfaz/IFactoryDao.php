<?php

include_once realpath('../dao/entities/Actividades_jovenesDao.php');
include_once realpath('../dao/entities/Compromisos_equipoDao.php');
include_once realpath('../dao/entities/Concepto_cumplimientoDao.php');
include_once realpath('../dao/entities/ContratoDao.php');
include_once realpath('../dao/entities/Contrato_SolicitudDao.php');
include_once realpath('../dao/entities/Cumplimiento_acompanamientoDao.php');
include_once realpath('../dao/entities/Cumplimiento_cronogramaDao.php');
include_once realpath('../dao/entities/Cumplimiento_objetivosDao.php');
include_once realpath('../dao/entities/Estado_proyectoDao.php');
include_once realpath('../dao/entities/FacultadDao.php');
include_once realpath('../dao/entities/Grupo_investigacionDao.php');
include_once realpath('../dao/entities/Impactos_socialesDao.php');
include_once realpath('../dao/entities/Informe_gestion_jovenesDao.php');
include_once realpath('../dao/entities/Informes_gestion_financiadoDao.php');
include_once realpath('../dao/entities/InvestigadorDao.php');
include_once realpath('../dao/entities/Linea_investigacionDao.php');
include_once realpath('../dao/entities/ModulosDao.php');
include_once realpath('../dao/entities/PerfilesDao.php');
include_once realpath('../dao/entities/Solicitud_horasDao.php');
include_once realpath('../dao/entities/Solicitud_horas_financiadoDao.php');
include_once realpath('../dao/entities/Solicitud_horas_tutorDao.php');
include_once realpath('../dao/entities/Tipo_docuemntoDao.php');
include_once realpath('../dao/entities/ProyectosDao.php');
include_once realpath('../dao/entities/PersonaDao.php');
include_once realpath('../dao/entities/PerfilesDao.php');
include_once realpath('../dao/entities/Tipo_ponenciasDao.php');
include_once realpath('../dao/entities/Tipo_publicacionesDao.php');
include_once realpath('../dao/entities/Tipo_vinculacionDao.php');
include_once realpath('../dao/entities/Uso_equiposDao.php');
include_once realpath('../dao/entities/UsuariosDao.php');

interface IFactoryDao {

    /**
     * Devuelve una instancia de Actividades_jovenesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Actividades_jovenesDao
     */
    public function getActividades_jovenesDao($dbName);

    /**
     * Devuelve una instancia de Compromisos_equipoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Compromisos_equipoDao
     */
    public function getCompromisos_equipoDao($dbName);

    /**
     * Devuelve una instancia de Concepto_cumplimientoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Concepto_cumplimientoDao
     */
    public function getConcepto_cumplimientoDao($dbName);

    /**
     * Devuelve una instancia de ContratoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ContratoDao
     */
    public function getContratoDao($dbName);


    public function getContrato_SolicitudDao($dbName);

    /**
     * Devuelve una instancia de Cumplimiento_acompanamientoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cumplimiento_acompanamientoDao
     */
    public function getCumplimiento_acompanamientoDao($dbName);

    /**
     * Devuelve una instancia de Cumplimiento_cronogramaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cumplimiento_cronogramaDao
     */
    public function getCumplimiento_cronogramaDao($dbName);

    /**
     * Devuelve una instancia de Cumplimiento_objetivosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cumplimiento_objetivosDao
     */
    public function getCumplimiento_objetivosDao($dbName);

    /**
     * Devuelve una instancia de Estado_proyectoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Estado_proyectoDao
     */
    public function getEstado_proyectoDao($dbName);

    /**
     * Devuelve una instancia de FacultadDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FacultadDao
     */
    public function getFacultadDao($dbName);

    /**
     * Devuelve una instancia de Grupo_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_investigacionDao
     */
    public function getGrupo_investigacionDao($dbName);

    /**
     * Devuelve una instancia de Impactos_socialesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Impactos_socialesDao
     */
    public function getImpactos_socialesDao($dbName);

    /**
     * Devuelve una instancia de Informe_gestion_jovenesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Informe_gestion_jovenesDao
     */
    public function getInforme_gestion_jovenesDao($dbName);

    /**
     * Devuelve una instancia de Informes_gestion_financiadoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Informes_gestion_financiadoDao
     */
    public function getInformes_gestion_financiadoDao($dbName);

    /**
     * Devuelve una instancia de InvestigadorDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de InvestigadorDao
     */
    public function getInvestigadorDao($dbName);

    /**
     * Devuelve una instancia de Linea_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Linea_investigacionDao
     */
    public function getLinea_investigacionDao($dbName);

    /**
     * Devuelve una instancia de ModulosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ModulosDao
     */
    public function getModulosDao($dbName);

    /**
     * Devuelve una instancia de PerfilesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PerfilesDao
     */
    public function getPerfilesDao($dbName);

    /**
     * Devuelve una instancia de Solicitud_horasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Solicitud_horasDao
     */
    public function getSolicitud_horasDao($dbName);

    /**
     * Devuelve una instancia de Solicitud_horas_financiadoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Solicitud_horas_financiadoDao
     */
    public function getSolicitud_horas_financiadoDao($dbName);

    public function getSolicitud_horas_tutorDao($dbName);

    public function getPersonaDao($dbName);

    /**
     * Devuelve una instancia de Tipo_docuemntoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_docuemntoDao
     */
    public function getTipo_docuemntoDao($dbName);

    /**
     * Devuelve una instancia de Tipo_ponenciasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_ponenciasDao
     */
    public function getTipo_ponenciasDao($dbName);

    /**
     * Devuelve una instancia de Tipo_publicacionesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_publicacionesDao
     */
    public function getTipo_publicacionesDao($dbName);

    /**
     * Devuelve una instancia de Tipo_vinculacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_vinculacionDao
     */
    public function getTipo_vinculacionDao($dbName);

    /**
     * Devuelve una instancia de Uso_equiposDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Uso_equiposDao
     */
    public function getUso_equiposDao($dbName);
}

//That`s all folks!