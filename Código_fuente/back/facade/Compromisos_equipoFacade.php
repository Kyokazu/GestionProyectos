<?php

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Compromisos_equipo.php');
require_once realpath('../dao/interfaz/ICompromisos_equipoDao.php');

class Compromisos_equipoFacade {

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
     * Crea un objeto Compromisos_equipo a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param estado_1
     * @param cantidad_1
     * @param estado_2
     * @param cantidad_2
     * @param estado_3
     * @param cantidad_3
     * @param estado_4
     * @param cantidad_4
     * @param estado_5
     * @param cantidad_5
     * @param id_informe_gestion_financiado
     */
    public static function insert($estado_1, $cantidad_1, $estado_2, $cantidad_2, $estado_3, $cantidad_3, $estado_4, $cantidad_4, $estado_5, $cantidad_5, $id_informe_gestion_financiado) {

        $compromisos_equipo = new Compromisos_equipo();
        $compromisos_equipo->setEstado_1($estado_1);
        $compromisos_equipo->setCantidad_1($cantidad_1);
        $compromisos_equipo->setEstado_2($estado_2);
        $compromisos_equipo->setCantidad_2($cantidad_2);
        $compromisos_equipo->setEstado_3($estado_3);
        $compromisos_equipo->setCantidad_3($cantidad_3);
        $compromisos_equipo->setEstado_4($estado_4);
        $compromisos_equipo->setCantidad_4($cantidad_4);
        $compromisos_equipo->setEstado_5($estado_5);
        $compromisos_equipo->setCantidad_5($cantidad_5);
        $compromisos_equipo->setId_informe_gestion_financiado($id_informe_gestion_financiado);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $compromisos_equipoDao = $FactoryDao->getcompromisos_equipoDao(self::getDataBaseDefault());
        $rtn = $compromisos_equipoDao->insert($compromisos_equipo);
        $compromisos_equipoDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Compromisos_equipo de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id) {
        $compromisos_equipo = new Compromisos_equipo();
        $compromisos_equipo->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $compromisos_equipoDao = $FactoryDao->getcompromisos_equipoDao(self::getDataBaseDefault());
        $result = $compromisos_equipoDao->select($compromisos_equipo);
        $compromisos_equipoDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Compromisos_equipo  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param estado_1
     * @param cantidad_1
     * @param estado_2
     * @param cantidad_2
     * @param estado_3
     * @param cantidad_3
     * @param estado_4
     * @param cantidad_4
     * @param estado_5
     * @param cantidad_5
     * @param id_informe_gestion_financiado
     */
    public static function update($id, $estado_1, $cantidad_1, $estado_2, $cantidad_2, $estado_3, $cantidad_3, $estado_4, $cantidad_4, $estado_5, $cantidad_5, $id_informe_gestion_financiado) {
        $compromisos_equipo = self::select($id);
        $compromisos_equipo->setEstado_1($estado_1);
        $compromisos_equipo->setCantidad_1($cantidad_1);
        $compromisos_equipo->setEstado_2($estado_2);
        $compromisos_equipo->setCantidad_2($cantidad_2);
        $compromisos_equipo->setEstado_3($estado_3);
        $compromisos_equipo->setCantidad_3($cantidad_3);
        $compromisos_equipo->setEstado_4($estado_4);
        $compromisos_equipo->setCantidad_4($cantidad_4);
        $compromisos_equipo->setEstado_5($estado_5);
        $compromisos_equipo->setCantidad_5($cantidad_5);
        $compromisos_equipo->setId_informe_gestion_financiado($id_informe_gestion_financiado);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $compromisos_equipoDao = $FactoryDao->getcompromisos_equipoDao(self::getDataBaseDefault());
        $compromisos_equipoDao->update($compromisos_equipo);
        $compromisos_equipoDao->close();
    }

    /**
     * Elimina un objeto Compromisos_equipo de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id) {
        $compromisos_equipo = new Compromisos_equipo();
        $compromisos_equipo->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $compromisos_equipoDao = $FactoryDao->getcompromisos_equipoDao(self::getDataBaseDefault());
        $compromisos_equipoDao->delete($compromisos_equipo);
        $compromisos_equipoDao->close();
    }

    /**
     * Lista todos los objetos Compromisos_equipo de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Compromisos_equipo en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $compromisos_equipoDao = $FactoryDao->getcompromisos_equipoDao(self::getDataBaseDefault());
        $result = $compromisos_equipoDao->listAll();
        $compromisos_equipoDao->close();
        return $result;
    }

}

//That`s all folks!