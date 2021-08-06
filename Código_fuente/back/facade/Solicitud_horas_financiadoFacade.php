<?php

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Solicitud_horas_financiado.php');
require_once realpath('../dao/interfaz/ISolicitud_horas_financiadoDao.php');

class Solicitud_horas_financiadoFacade {

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
     * Crea un objeto Solicitud_horas_financiado a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param id_proyecto
     * @param id_contrato
     */
    public static function insert($nombre_proyecto, $id_proyecto, $id_contrato, $fecha_ultimo_informe) {
        $solicitud_horas_financiado = new Solicitud_horas_financiado();

        $solicitud_horas_financiado->setNombre_proyecto($nombre_proyecto);
        $solicitud_horas_financiado->setId_contrato($id_contrato);
        $solicitud_horas_financiado->setId_proyecto($id_proyecto);
        $solicitud_horas_financiado->setFecha_solicitud($id_proyecto);
        $solicitud_horas_financiado->setFecha_ultimo_informe($fecha_ultimo_informe);
        $solicitud_horas_financiado->setFecha_solicitud(date('Y-m-d'));


        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_financiadoDao = $FactoryDao->getsolicitud_horas_financiadoDao(self::getDataBaseDefault());
        $rtn = $solicitud_horas_financiadoDao->insert($solicitud_horas_financiado);
        $solicitud_horas_financiadoDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Solicitud_horas_financiado de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id) {
        $solicitud_horas_financiado = new Solicitud_horas_financiado();
        $solicitud_horas_financiado->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_financiadoDao = $FactoryDao->getsolicitud_horas_financiadoDao(self::getDataBaseDefault());
        $result = $solicitud_horas_financiadoDao->select($solicitud_horas_financiado);
        $solicitud_horas_financiadoDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Solicitud_horas_financiado  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param id_proyecto
     * @param id_contrato
     */
    public static function update($id, $id_proyecto, $id_contrato, $estado_solicitud) {
        $solicitud_horas_financiado = self::select($id);
        $solicitud_horas_financiado->setId_proyecto($id_proyecto);
        $solicitud_horas_financiado->setId_contrato($id_contrato);
        $solicitud_horas_financiado->setEstado_solicitud($estado_solicitud);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_financiadoDao = $FactoryDao->getsolicitud_horas_financiadoDao(self::getDataBaseDefault());
        $solicitud_horas_financiadoDao->update($solicitud_horas_financiado);
        $solicitud_horas_financiadoDao->close();
    }

    public static function update2($id) {
        $solicitud_horas_financiado = self::select($id);
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_financiadoDao = $FactoryDao->getsolicitud_horas_financiadoDao(self::getDataBaseDefault());
        $solicitud_horas_financiadoDao->update2($solicitud_horas_financiado);
        $solicitud_horas_financiadoDao->close();
    }
      public static function update3($id) {
        $solicitud_horas_financiado = self::select($id);
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_financiadoDao = $FactoryDao->getsolicitud_horas_financiadoDao(self::getDataBaseDefault());
        $solicitud_horas_financiadoDao->update3($solicitud_horas_financiado);
        $solicitud_horas_financiadoDao->close();
    }
     public static function update4($id) {
        $solicitud_horas_financiado = self::select($id);
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_financiadoDao = $FactoryDao->getsolicitud_horas_financiadoDao(self::getDataBaseDefault());
        $solicitud_horas_financiadoDao->update4($solicitud_horas_financiado);
        $solicitud_horas_financiadoDao->close();
    }

    /**
     * Elimina un objeto Solicitud_horas_financiado de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id) {
        $solicitud_horas_financiado = new Solicitud_horas_financiado();
        $solicitud_horas_financiado->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_financiadoDao = $FactoryDao->getsolicitud_horas_financiadoDao(self::getDataBaseDefault());
        $solicitud_horas_financiadoDao->delete($solicitud_horas_financiado);
        $solicitud_horas_financiadoDao->close();
    }

    /**
     * Lista todos los objetos Solicitud_horas_financiado de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Solicitud_horas_financiado en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_financiadoDao = $FactoryDao->getsolicitud_horas_financiadoDao(self::getDataBaseDefault());
        $result = $solicitud_horas_financiadoDao->listAll();
        $solicitud_horas_financiadoDao->close();
        return $result;
    }

    public static function listAll2() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_financiadoDao = $FactoryDao->getsolicitud_horas_financiadoDao(self::getDataBaseDefault());
        $result = $solicitud_horas_financiadoDao->listAll2();
        $solicitud_horas_financiadoDao->close();
        return $result;
    }

    public static function listAll3() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $solicitud_horas_financiadoDao = $FactoryDao->getsolicitud_horas_financiadoDao(self::getDataBaseDefault());
        $result = $solicitud_horas_financiadoDao->listAll3();
        $solicitud_horas_financiadoDao->close();
        return $result;
    }

}
