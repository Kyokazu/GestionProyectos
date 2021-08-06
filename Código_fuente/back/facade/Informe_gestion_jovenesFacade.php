<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    404 Frase no encontrada  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Informe_gestion_jovenes.php');
require_once realpath('../dao/interfaz/IInforme_gestion_jovenesDao.php');

class Informe_gestion_jovenesFacade {

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
     * Crea un objeto Informe_gestion_jovenes a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param facultad
     * @param grupo_investigacion
     * @param departamento
     * @param nombre_tutor
     * @param linea_investigacion
     * @param nombre_joven
     * @param convenio_colciencias
     * @param numero_convocatoria
     * @param periodo_tutoria
     */
    public static function insert($facultad, $grupo_investigacion, $departamento, $nombre_tutor, $linea_investigacion, $nombre_joven, $convenio_colciencias, $numero_convocatoria, $periodo_tutoria) {
        $informe_gestion_jovenes = new Informe_gestion_jovenes();

        $informe_gestion_jovenes->setFacultad($facultad);
        $informe_gestion_jovenes->setGrupo_investigacion($grupo_investigacion);
        $informe_gestion_jovenes->setDepartamento($departamento);
        $informe_gestion_jovenes->setNombre_tutor($nombre_tutor);
        $informe_gestion_jovenes->setLinea_investigacion($linea_investigacion);
        $informe_gestion_jovenes->setNombre_joven($nombre_joven);
        $informe_gestion_jovenes->setConvenio_colciencias($convenio_colciencias);
        $informe_gestion_jovenes->setNumero_convocatoria($numero_convocatoria);
        $informe_gestion_jovenes->setPeriodo_tutoria($periodo_tutoria);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informe_gestion_jovenesDao = $FactoryDao->getinforme_gestion_jovenesDao(self::getDataBaseDefault());
        $rtn = $informe_gestion_jovenesDao->insert($informe_gestion_jovenes);
        $informe_gestion_jovenesDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Informe_gestion_jovenes de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id) {
        $informe_gestion_jovenes = new Informe_gestion_jovenes();
        $informe_gestion_jovenes->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informe_gestion_jovenesDao = $FactoryDao->getinforme_gestion_jovenesDao(self::getDataBaseDefault());
        $result = $informe_gestion_jovenesDao->select($informe_gestion_jovenes);
        $informe_gestion_jovenesDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Informe_gestion_jovenes  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param facultad
     * @param grupo_investigacion
     * @param departamento
     * @param nombre_tutor
     * @param linea_investigacion
     * @param nombre_joven
     * @param convenio_colciencias
     * @param numero_convocatoria
     * @param periodo_tutoria
     */
    public static function update($id, $facultad, $grupo_investigacion, $departamento, $nombre_tutor, $linea_investigacion, $nombre_joven, $convenio_colciencias, $numero_convocatoria, $periodo_tutoria, $estado_solicitud) {
        $informe_gestion_jovenes = self::select($id);
        $informe_gestion_jovenes->setFacultad($facultad);
        $informe_gestion_jovenes->setGrupo_investigacion($grupo_investigacion);
        $informe_gestion_jovenes->setDepartamento($departamento);
        $informe_gestion_jovenes->setNombre_tutor($nombre_tutor);
        $informe_gestion_jovenes->setLinea_investigacion($linea_investigacion);
        $informe_gestion_jovenes->setNombre_joven($nombre_joven);
        $informe_gestion_jovenes->setConvenio_colciencias($convenio_colciencias);
        $informe_gestion_jovenes->setNumero_convocatoria($numero_convocatoria);
        $informe_gestion_jovenes->setPeriodo_tutoria($periodo_tutoria);
        $informe_gestion_jovenes->setPeriodo_tutoria($estado_solicitud);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informe_gestion_jovenesDao = $FactoryDao->getinforme_gestion_jovenesDao(self::getDataBaseDefault());
        $informe_gestion_jovenesDao->update($informe_gestion_jovenes);
        $informe_gestion_jovenesDao->close();
    }

    public static function update2($id) {
        $informe_gestion_jovenes = self::select($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informe_gestion_jovenesDao = $FactoryDao->getinforme_gestion_jovenesDao(self::getDataBaseDefault());
        $informe_gestion_jovenesDao->update2($informe_gestion_jovenes);
        $informe_gestion_jovenesDao->close();
    }

    public static function update3($id) {
        $informe_gestion_jovenes = self::select($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informe_gestion_jovenesDao = $FactoryDao->getinforme_gestion_jovenesDao(self::getDataBaseDefault());
        $informe_gestion_jovenesDao->update3($informe_gestion_jovenes);
        $informe_gestion_jovenesDao->close();
    }

    public static function update4($id) {
        $informe_gestion_jovenes = self::select($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informe_gestion_jovenesDao = $FactoryDao->getinforme_gestion_jovenesDao(self::getDataBaseDefault());
        $informe_gestion_jovenesDao->update4($informe_gestion_jovenes);
        $informe_gestion_jovenesDao->close();
    }

    /**
     * Elimina un objeto Informe_gestion_jovenes de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id) {
        $informe_gestion_jovenes = new Informe_gestion_jovenes();
        $informe_gestion_jovenes->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informe_gestion_jovenesDao = $FactoryDao->getinforme_gestion_jovenesDao(self::getDataBaseDefault());
        $informe_gestion_jovenesDao->delete($informe_gestion_jovenes);
        $informe_gestion_jovenesDao->close();
    }

    /**
     * Lista todos los objetos Informe_gestion_jovenes de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Informe_gestion_jovenes en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informe_gestion_jovenesDao = $FactoryDao->getinforme_gestion_jovenesDao(self::getDataBaseDefault());
        $result = $informe_gestion_jovenesDao->listAll();
        $informe_gestion_jovenesDao->close();
        return $result;
    }

}

//That`s all folks!