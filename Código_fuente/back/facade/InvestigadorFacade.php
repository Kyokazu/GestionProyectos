<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Podrías agradecernos con unos cuantos billetes _/(n.n)\_  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Investigador.php');
require_once realpath('../dao/interfaz/IInvestigadorDao.php');

class InvestigadorFacade {

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
     * Crea un objeto Investigador a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param tipo_investigador
     * @param horas_semana
     * @param id_solicitud_horas_financiado
     * @param id_informe_gestion_financiado
     */
    public static function insert($id, $tipo_investigador, $horas_semana, $id_solicitud_horas_financiado, $id_informe_gestion_financiado) {
        $investigador = new Investigador();
        $investigador->setId($id);
        $investigador->setTipo_investigador($tipo_investigador);
        $investigador->setHoras_semana($horas_semana);
        $investigador->setId_solicitud_horas_financiado($id_solicitud_horas_financiado);
        $investigador->setId_informe_gestion_financiado($id_informe_gestion_financiado);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $investigadorDao = $FactoryDao->getinvestigadorDao(self::getDataBaseDefault());
        $rtn = $investigadorDao->insert($investigador);
        $investigadorDao->close();
        return $rtn;
    }

    public static function insertFOIN06($nombre_investigador, $horas_semana, $tipo_investigador, $id_solicitud_horas_financiado) {

        $investigador = new Investigador();
        $investigador->setNombre_investigador($nombre_investigador);
        $investigador->setHoras_semana($horas_semana);
        $investigador->setTipo_investigador($tipo_investigador);
        $investigador->setId_solicitud_horas_financiado($id_solicitud_horas_financiado);


        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $investigadorDao = $FactoryDao->getinvestigadorDao(self::getDataBaseDefault());
        $rtn = $investigadorDao->insert2($investigador);
        $investigadorDao->close();
        return $rtn;
    }

    public static function insertFOIN15($nombre_investigador, $tipo_investigador, $horas_semana, $id_solicitud) {

        $investigador = new Investigador();
        $investigador->setNombre_investigador($nombre_investigador);
        $investigador->setHoras_semana($horas_semana);
        $investigador->setTipo_investigador($tipo_investigador);
        $investigador->setId_informe_gestion_financiado($id_solicitud);


        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $investigadorDao = $FactoryDao->getinvestigadorDao(self::getDataBaseDefault());
        $rtn = $investigadorDao->insert3($investigador);
        $investigadorDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Investigador de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id) {
        $investigador = new Investigador();
        $investigador->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $investigadorDao = $FactoryDao->getinvestigadorDao(self::getDataBaseDefault());
        $result = $investigadorDao->select($investigador);
        $investigadorDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Investigador  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param tipo_investigador
     * @param horas_semana
     * @param id_solicitud_horas_financiado
     * @param id_informe_gestion_financiado
     */
    public static function update($id, $tipo_investigador, $horas_semana, $id_solicitud_horas_financiado, $id_informe_gestion_financiado) {
        $investigador = self::select($id);
        $investigador->setTipo_investigador($tipo_investigador);
        $investigador->setHoras_semana($horas_semana);
        $investigador->setId_solicitud_horas_financiado($id_solicitud_horas_financiado);
        $investigador->setId_informe_gestion_financiado($id_informe_gestion_financiado);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $investigadorDao = $FactoryDao->getinvestigadorDao(self::getDataBaseDefault());
        $investigadorDao->update($investigador);
        $investigadorDao->close();
    }

    /**
     * Elimina un objeto Investigador de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id) {
        $investigador = new Investigador();
        $investigador->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $investigadorDao = $FactoryDao->getinvestigadorDao(self::getDataBaseDefault());
        $investigadorDao->delete($investigador);
        $investigadorDao->close();
    }

    /**
     * Lista todos los objetos Investigador de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Investigador en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $investigadorDao = $FactoryDao->getinvestigadorDao(self::getDataBaseDefault());
        $result = $investigadorDao->listAll();
        $investigadorDao->close();
        return $result;
    }

}

//That`s all folks!