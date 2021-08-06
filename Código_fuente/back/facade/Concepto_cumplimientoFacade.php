<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Concepto_cumplimiento.php');
require_once realpath('../dao/interfaz/IConcepto_cumplimientoDao.php');

class Concepto_cumplimientoFacade {

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
     * Crea un objeto Concepto_cumplimiento a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param id_proyecto
     * @param nombre_investigador
     * @param nombre_proyecto
     * @param condicion_investigador
     */
    public static function insert($id_proyecto, $nombre_investigador, $nombre_proyecto, $condicion_investigador) {
        $concepto_cumplimiento = new Concepto_cumplimiento();

        $concepto_cumplimiento->setId_proyecto($id_proyecto);
        $concepto_cumplimiento->setNombre_investigador($nombre_investigador);
        $concepto_cumplimiento->setNombre_proyecto($nombre_proyecto);
        $concepto_cumplimiento->setCondicion_investigador($condicion_investigador);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $concepto_cumplimientoDao = $FactoryDao->getconcepto_cumplimientoDao(self::getDataBaseDefault());
        $rtn = $concepto_cumplimientoDao->insert($concepto_cumplimiento);
        $concepto_cumplimientoDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Concepto_cumplimiento de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id) {
        $concepto_cumplimiento = new Concepto_cumplimiento();
        $concepto_cumplimiento->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $concepto_cumplimientoDao = $FactoryDao->getconcepto_cumplimientoDao(self::getDataBaseDefault());
        $result = $concepto_cumplimientoDao->select($concepto_cumplimiento);
        $concepto_cumplimientoDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Concepto_cumplimiento  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param id_proyecto
     * @param nombre_investigador
     * @param nombre_proyecto
     * @param condicion_investigador
     */
    public static function update($id, $id_proyecto, $nombre_investigador, $nombre_proyecto, $condicion_investigador, $estado_solicitud) {
        $concepto_cumplimiento = self::select($id);
        $concepto_cumplimiento->setId_proyecto($id_proyecto);
        $concepto_cumplimiento->setNombre_investigador($nombre_investigador);
        $concepto_cumplimiento->setNombre_proyecto($nombre_proyecto);
        $concepto_cumplimiento->setCondicion_investigador($condicion_investigador);
        $concepto_cumplimiento->setEstado_solicitud($estado_solicitud);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $concepto_cumplimientoDao = $FactoryDao->getconcepto_cumplimientoDao(self::getDataBaseDefault());
        $concepto_cumplimientoDao->update($concepto_cumplimiento);
        $concepto_cumplimientoDao->close();
    }

    public static function update2($id) {
        $concepto_cumplimiento = self::select($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $concepto_cumplimientoDao = $FactoryDao->getconcepto_cumplimientoDao(self::getDataBaseDefault());
        $concepto_cumplimientoDao->update2($concepto_cumplimiento);
        $concepto_cumplimientoDao->close();
    }
    
     public static function update3($id) {
        $concepto_cumplimiento = self::select($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $concepto_cumplimientoDao = $FactoryDao->getconcepto_cumplimientoDao(self::getDataBaseDefault());
        $concepto_cumplimientoDao->update3($concepto_cumplimiento);
        $concepto_cumplimientoDao->close();
    }
    public static function update4($id) {
        $concepto_cumplimiento = self::select($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $concepto_cumplimientoDao = $FactoryDao->getconcepto_cumplimientoDao(self::getDataBaseDefault());
        $concepto_cumplimientoDao->update4($concepto_cumplimiento);
        $concepto_cumplimientoDao->close();
    }

    /**
     * Elimina un objeto Concepto_cumplimiento de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id) {
        $concepto_cumplimiento = new Concepto_cumplimiento();
        $concepto_cumplimiento->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $concepto_cumplimientoDao = $FactoryDao->getconcepto_cumplimientoDao(self::getDataBaseDefault());
        $concepto_cumplimientoDao->delete($concepto_cumplimiento);
        $concepto_cumplimientoDao->close();
    }

    /**
     * Lista todos los objetos Concepto_cumplimiento de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Concepto_cumplimiento en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $concepto_cumplimientoDao = $FactoryDao->getconcepto_cumplimientoDao(self::getDataBaseDefault());
        $result = $concepto_cumplimientoDao->listAll();
        $concepto_cumplimientoDao->close();
        return $result;
    }

}

//That`s all folks!