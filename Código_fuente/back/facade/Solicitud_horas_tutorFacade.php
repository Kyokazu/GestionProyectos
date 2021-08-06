<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Tienes que considerar la posibilidad de que a Dios no le caes bien.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Solicitud_horas_tutor.php');
require_once realpath('../dao/interfaz/ISolicitud_horas_tutorDao.php');
require_once realpath('../dto/Docente.php');
require_once realpath('../dto/Contrato.php');

class Solicitud_horas_tutorFacade {

    /**
     * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
     * @return idGestor Devuelve el identificador del gestor de conexión
     */
    private static function getGestorDefault() {
        return DEFAULT_GESTOR;
    }

    /**
     * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
     * @return dbName Devuelve el nombre de la base de datos a emplear
     */
    private static function getDataBaseDefault() {
        return DEFAULT_DBNAME;
    }

    /**
     * Crea un objeto Solicitud_horas_tutor a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param docente_id
     * @param nombre_convenio
     * @param grupo_investigacion
     * @param nombre_propuesta
     * @param contrato_id
     * @param fecha_inicio_joven
     * @param horas_solicitadas
     */
    public static function insert($nombre_docente, $nombre_convenio, $grupo_investigacion, $nombre_propuesta, $fecha_inicio_actividades, $horas_solicitadas, $numero_acta, $condicion_investigador, $semestre_academico) {
        $solicitud_horas_tutor = new Solicitud_horas_tutor();

        $solicitud_horas_tutor->setNombre_docente($nombre_docente);
        $solicitud_horas_tutor->setNombre_convenio($nombre_convenio);
        $solicitud_horas_tutor->setGrupo_investigacion($grupo_investigacion);
        $solicitud_horas_tutor->setNombre_propuesta($nombre_propuesta);
        $solicitud_horas_tutor->setFecha_inicio_joven($fecha_inicio_actividades);
        $solicitud_horas_tutor->setHoras_solicitadas($horas_solicitadas);
        $solicitud_horas_tutor->setNumero_acta($numero_acta);
        $solicitud_horas_tutor->setTipo_tutor($condicion_investigador);
        $solicitud_horas_tutor->setSemestre($semestre_academico);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_tutorDao = $FactoryDao->getsolicitud_horas_tutorDao(self::getDataBaseDefault());
        $rtn = $solicitud_horas_tutorDao->insert($solicitud_horas_tutor);
        $solicitud_horas_tutorDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Solicitud_horas_tutor de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id) {
        $solicitud_horas_tutor = new Solicitud_horas_tutor();
        $solicitud_horas_tutor->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_tutorDao = $FactoryDao->getsolicitud_horas_tutorDao(self::getDataBaseDefault());
        $result = $solicitud_horas_tutorDao->select($solicitud_horas_tutor);
        $solicitud_horas_tutorDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Solicitud_horas_tutor  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param docente_id
     * @param nombre_convenio
     * @param grupo_investigacion
     * @param nombre_propuesta
     * @param contrato_id
     * @param fecha_inicio_joven
     * @param horas_solicitadas
     */
    public static function update($id, $docente_id, $nombre_convenio, $grupo_investigacion, $nombre_propuesta, $contrato_id, $fecha_inicio_joven, $horas_solicitadas, $estado_solicitud) {
        $solicitud_horas_tutor = self::select($id);
        $solicitud_horas_tutor->setDocente_id($docente_id);
        $solicitud_horas_tutor->setNombre_convenio($nombre_convenio);
        $solicitud_horas_tutor->setGrupo_investigacion($grupo_investigacion);
        $solicitud_horas_tutor->setNombre_propuesta($nombre_propuesta);
        $solicitud_horas_tutor->setContrato_id($contrato_id);
        $solicitud_horas_tutor->setFecha_inicio_joven($fecha_inicio_joven);
        $solicitud_horas_tutor->setHoras_solicitadas($horas_solicitadas);
        $solicitud_horas_tutor->setEstado_solicitud($estado_solicitud);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_tutorDao = $FactoryDao->getsolicitud_horas_tutorDao(self::getDataBaseDefault());
        $solicitud_horas_tutorDao->update($solicitud_horas_tutor);
        $solicitud_horas_tutorDao->close();
    }

    public static function update2($id) {
        $solicitud_horas_tutor = self::select($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_tutorDao = $FactoryDao->getsolicitud_horas_tutorDao(self::getDataBaseDefault());
        $solicitud_horas_tutorDao->update2($solicitud_horas_tutor);
        $solicitud_horas_tutorDao->close();
    }

    public static function update3($id) {
        $solicitud_horas_tutor = self::select($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_tutorDao = $FactoryDao->getsolicitud_horas_tutorDao(self::getDataBaseDefault());
        $solicitud_horas_tutorDao->update3($solicitud_horas_tutor);
        $solicitud_horas_tutorDao->close();
    }
    /**
     * Elimina un objeto Solicitud_horas_tutor de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id) {
        $solicitud_horas_tutor = new Solicitud_horas_tutor();
        $solicitud_horas_tutor->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_tutorDao = $FactoryDao->getsolicitud_horas_tutorDao(self::getDataBaseDefault());
        $solicitud_horas_tutorDao->delete($solicitud_horas_tutor);
        $solicitud_horas_tutorDao->close();
    }

    /**
     * Lista todos los objetos Solicitud_horas_tutor de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Solicitud_horas_tutor en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_tutorDao = $FactoryDao->getsolicitud_horas_tutorDao(self::getDataBaseDefault());
        $result = $solicitud_horas_tutorDao->listAll();
        $solicitud_horas_tutorDao->close();
        return $result;
    }

}

//That`s all folks!