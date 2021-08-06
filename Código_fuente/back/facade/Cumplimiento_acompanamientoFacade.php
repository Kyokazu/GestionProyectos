<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Cumplimiento_acompanamiento.php');
require_once realpath('../dao/interfaz/ICumplimiento_acompanamientoDao.php');

class Cumplimiento_acompanamientoFacade {

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
     * Crea un objeto Cumplimiento_acompanamiento a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param nombre_joven
     * @param nombre_tutor
     */
    public static function insert($nombre_tutor, $nombre_joven) {
        $cumplimiento_acompanamiento = new Cumplimiento_acompanamiento();

        $cumplimiento_acompanamiento->setNombre_joven($nombre_joven);
        $cumplimiento_acompanamiento->setNombre_tutor($nombre_tutor);


        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_acompanamientoDao = $FactoryDao->getcumplimiento_acompanamientoDao(self::getDataBaseDefault());
        $rtn = $cumplimiento_acompanamientoDao->insert($cumplimiento_acompanamiento);
        $cumplimiento_acompanamientoDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Cumplimiento_acompanamiento de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id) {
        $cumplimiento_acompanamiento = new Cumplimiento_acompanamiento();
        $cumplimiento_acompanamiento->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_acompanamientoDao = $FactoryDao->getcumplimiento_acompanamientoDao(self::getDataBaseDefault());
        $result = $cumplimiento_acompanamientoDao->select($cumplimiento_acompanamiento);
        $cumplimiento_acompanamientoDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Cumplimiento_acompanamiento  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param nombre_joven
     * @param nombre_tutor
     */
    public static function update($id, $nombre_joven, $nombre_tutor, $estado_solicitud) {
        $cumplimiento_acompanamiento = self::select($id);
        $cumplimiento_acompanamiento->setNombre_joven($nombre_joven);
        $cumplimiento_acompanamiento->setNombre_tutor($nombre_tutor);
        $cumplimiento_acompanamiento->setEstado_solicitud($estado_solicitud);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_acompanamientoDao = $FactoryDao->getcumplimiento_acompanamientoDao(self::getDataBaseDefault());
        $cumplimiento_acompanamientoDao->update($cumplimiento_acompanamiento);
        $cumplimiento_acompanamientoDao->close();
    }

    public static function update2($id) {
        $cumplimiento_acompanamiento = self::select($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_acompanamientoDao = $FactoryDao->getcumplimiento_acompanamientoDao(self::getDataBaseDefault());
        $cumplimiento_acompanamientoDao->update2($cumplimiento_acompanamiento);
        $cumplimiento_acompanamientoDao->close();
    }

    /**
     * Elimina un objeto Cumplimiento_acompanamiento de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id) {
        $cumplimiento_acompanamiento = new Cumplimiento_acompanamiento();
        $cumplimiento_acompanamiento->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_acompanamientoDao = $FactoryDao->getcumplimiento_acompanamientoDao(self::getDataBaseDefault());
        $cumplimiento_acompanamientoDao->delete($cumplimiento_acompanamiento);
        $cumplimiento_acompanamientoDao->close();
    }

    /**
     * Lista todos los objetos Cumplimiento_acompanamiento de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Cumplimiento_acompanamiento en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_acompanamientoDao = $FactoryDao->getcumplimiento_acompanamientoDao(self::getDataBaseDefault());
        $result = $cumplimiento_acompanamientoDao->listAll();
        $cumplimiento_acompanamientoDao->close();
        return $result;
    }

}

//That`s all folks!