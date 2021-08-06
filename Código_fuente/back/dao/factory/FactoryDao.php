<?php

include_once realpath('../dao/conexion/Conexion.php');
include_once realpath('../dao/interfaz/IFactoryDao.php');

class FactoryDao implements IFactoryDao {

    private $conn;
    public static $NULL_GESTOR = -1;
    public static $MYSQL_FACTORY = 0;
    public static $POSTGRESQL_FACTORY = 1;
    public static $ORACLE_FACTORY = 2;
    public static $DERBY_FACTORY = 3;

    public function __construct($gestor) {
        $this->conn = new Conexion($gestor);
    }

    /**
     * Devuelve una instancia de Actividades_jovenesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Actividades_jovenesDao
     */
    public function getActividades_jovenesDao($dbName) {
        return new Actividades_jovenesDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Compromisos_equipoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Compromisos_equipoDao
     */
    public function getCompromisos_equipoDao($dbName) {
        return new Compromisos_equipoDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Concepto_cumplimientoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Concepto_cumplimientoDao
     */
    public function getConcepto_cumplimientoDao($dbName) {
        return new Concepto_cumplimientoDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de ContratoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ContratoDao
     */
    public function getContratoDao($dbName) {
        return new ContratoDao($this->conn->obtener($dbName));
    }

    public function getContrato_SolicitudDao($dbName) {
        return new Contrato_SolicitudDao($this->conn->obtener($dbName));
    }

    public function getSolicitud_horas_tutorDao($dbName) {
        return new Solicitud_horas_tutorDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Cumplimiento_acompanamientoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cumplimiento_acompanamientoDao
     */
    public function getCumplimiento_acompanamientoDao($dbName) {
        return new Cumplimiento_acompanamientoDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Cumplimiento_cronogramaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cumplimiento_cronogramaDao
     */
    public function getCumplimiento_cronogramaDao($dbName) {
        return new Cumplimiento_cronogramaDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Cumplimiento_objetivosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cumplimiento_objetivosDao
     */
    public function getCumplimiento_objetivosDao($dbName) {
        return new Cumplimiento_objetivosDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Estado_proyectoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Estado_proyectoDao
     */
    public function getEstado_proyectoDao($dbName) {
        return new Estado_proyectoDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de FacultadDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FacultadDao
     */
    public function getFacultadDao($dbName) {
        return new FacultadDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Grupo_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_investigacionDao
     */
    public function getGrupo_investigacionDao($dbName) {
        return new Grupo_investigacionDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Impactos_socialesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Impactos_socialesDao
     */
    public function getImpactos_socialesDao($dbName) {
        return new Impactos_socialesDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Informe_gestion_jovenesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Informe_gestion_jovenesDao
     */
    public function getInforme_gestion_jovenesDao($dbName) {
        return new Informe_gestion_jovenesDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Informes_gestion_financiadoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Informes_gestion_financiadoDao
     */
    public function getInformes_gestion_financiadoDao($dbName) {
        return new Informes_gestion_financiadoDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de InvestigadorDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de InvestigadorDao
     */
    public function getInvestigadorDao($dbName) {
        return new InvestigadorDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Linea_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Linea_investigacionDao
     */
    public function getLinea_investigacionDao($dbName) {
        return new Linea_investigacionDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de ModulosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ModulosDao
     */
    public function getModulosDao($dbName) {
        return new ModulosDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de PerfilesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PerfilesDao
     */
    public function getPerfilesDao($dbName) {
        return new PerfilesDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Solicitud_horasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Solicitud_horasDao
     */
    public function getSolicitud_horasDao($dbName) {
        return new Solicitud_horasDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Solicitud_horas_financiadoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Solicitud_horas_financiadoDao
     */
    public function getSolicitud_horas_financiadoDao($dbName) {
        return new Solicitud_horas_financiadoDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Tipo_docuemntoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_docuemntoDao
     */
    public function getTipo_docuemntoDao($dbName) {
        return new Tipo_docuemntoDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Tipo_ponenciasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_ponenciasDao
     */
    public function getTipo_ponenciasDao($dbName) {
        return new Tipo_ponenciasDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Tipo_publicacionesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_publicacionesDao
     */
    public function getTipo_publicacionesDao($dbName) {
        return new Tipo_publicacionesDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Tipo_vinculacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_vinculacionDao
     */
    public function getTipo_vinculacionDao($dbName) {
        return new Tipo_vinculacionDao($this->conn->obtener($dbName));
    }

    /**
     * Devuelve una instancia de Uso_equiposDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Uso_equiposDao
     */
    public function getUso_equiposDao($dbName) {
        return new Uso_equiposDao($this->conn->obtener($dbName));
    }

    public function getProyectosDao($dbName) {
        return new ProyectosDao($this->conn->obtener($dbName));
    }

    public function getPersonaDao($dbName) {
        return new PersonaDao($this->conn->obtener($dbName));
    }

    public function getUsuariosDao($dbName) {
        return new UsuariosDao($this->conn->obtener($dbName));
    }

}

//That`s all folks!