<?php

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Informes_gestion_financiado.php');
require_once realpath('../dao/interfaz/IInformes_gestion_financiadoDao.php');

class Informes_gestion_financiadoFacade {

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
     * Crea un objeto Informes_gestion_financiado a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param id_proyecto
     * @param grupo_investigacion
     * @param facultad
     * @param representante_facultad
     * @param duracion_proyecto
     * @param novedades_proyecto
     * @param conclusiones
     * @param observaciones
     */
    public static function insert($id_proyecto, $grupo_investigacion, $facultad, $representante_facultad, $duracion_proyecto) {

        $informes_gestion_financiado = new Informes_gestion_financiado();

        $informes_gestion_financiado->setId_proyecto($id_proyecto);
        $informes_gestion_financiado->setGrupo_investigacion($grupo_investigacion);
        $informes_gestion_financiado->setFacultad($facultad);
        $informes_gestion_financiado->setRepresentante_facultad($representante_facultad);
        $informes_gestion_financiado->setDuracion_proyecto($duracion_proyecto);


        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informes_gestion_financiadoDao = $FactoryDao->getinformes_gestion_financiadoDao(self::getDataBaseDefault());
        $rtn = $informes_gestion_financiadoDao->insert($informes_gestion_financiado);
        $informes_gestion_financiadoDao->close();
        return $rtn;
    }

    public static function insert2($id_proyecto, $grupo_investigacion, $facultad, $representante_facultad, $duracion_proyecto, $novedades, $conclusiones, $observacion) {

        $informes_gestion_financiado = new Informes_gestion_financiado();

        $informes_gestion_financiado->setId_proyecto($id_proyecto);
        $informes_gestion_financiado->setGrupo_investigacion($grupo_investigacion);
        $informes_gestion_financiado->setFacultad($facultad);
        $informes_gestion_financiado->setRepresentante_facultad($representante_facultad);
        $informes_gestion_financiado->setDuracion_proyecto($duracion_proyecto);
        $informes_gestion_financiado->setNovedades_proyecto($novedades);
        $informes_gestion_financiado->setConclusiones($conclusiones);
        $informes_gestion_financiado->setObservaciones($observacion);


        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informes_gestion_financiadoDao = $FactoryDao->getinformes_gestion_financiadoDao(self::getDataBaseDefault());
        $rtn = $informes_gestion_financiadoDao->insert2($informes_gestion_financiado);
        $informes_gestion_financiadoDao->close();
        return $rtn;
    }

    public static function insert3($id_proyecto, $grupo_investigacion, $facultad, $representante_facultad, $duracion_proyecto, $novedades, $conclusiones, $observacion) {

        $informes_gestion_financiado = new Informes_gestion_financiado();

        $informes_gestion_financiado->setId_proyecto($id_proyecto);
        $informes_gestion_financiado->setGrupo_investigacion($grupo_investigacion);
        $informes_gestion_financiado->setFacultad($facultad);
        $informes_gestion_financiado->setRepresentante_facultad($representante_facultad);
        $informes_gestion_financiado->setDuracion_proyecto($duracion_proyecto);
        $informes_gestion_financiado->setNovedades_proyecto($novedades);
        $informes_gestion_financiado->setConclusiones($conclusiones);
        $informes_gestion_financiado->setObservaciones($observacion);


        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informes_gestion_financiadoDao = $FactoryDao->getinformes_gestion_financiadoDao(self::getDataBaseDefault());
        $rtn = $informes_gestion_financiadoDao->insert2($informes_gestion_financiado);
        $informes_gestion_financiadoDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Informes_gestion_financiado de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id) {
        $informes_gestion_financiado = new Informes_gestion_financiado();
        $informes_gestion_financiado->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informes_gestion_financiadoDao = $FactoryDao->getinformes_gestion_financiadoDao(self::getDataBaseDefault());
        $result = $informes_gestion_financiadoDao->select($informes_gestion_financiado);
        $informes_gestion_financiadoDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Informes_gestion_financiado  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param id_proyecto
     * @param grupo_investigacion
     * @param facultad
     * @param representante_facultad
     * @param duracion_proyecto
     * @param novedades_proyecto
     * @param conclusiones
     * @param observaciones
     */
    public static function update($id) {
        $informes_gestion_financiado = self::select($id);


        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informes_gestion_financiadoDao = $FactoryDao->getinformes_gestion_financiadoDao(self::getDataBaseDefault());
        $informes_gestion_financiadoDao->update($informes_gestion_financiado);
        $informes_gestion_financiadoDao->close();
    }

    public static function update2($id) {
        $informes_gestion_financiado = self::select($id);


        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informes_gestion_financiadoDao = $FactoryDao->getinformes_gestion_financiadoDao(self::getDataBaseDefault());
        $informes_gestion_financiadoDao->update2($informes_gestion_financiado);
        $informes_gestion_financiadoDao->close();
    }

    /**
     * Elimina un objeto Informes_gestion_financiado de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id) {
        $informes_gestion_financiado = new Informes_gestion_financiado();
        $informes_gestion_financiado->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informes_gestion_financiadoDao = $FactoryDao->getinformes_gestion_financiadoDao(self::getDataBaseDefault());
        $informes_gestion_financiadoDao->delete($informes_gestion_financiado);
        $informes_gestion_financiadoDao->close();
    }

    /**
     * Lista todos los objetos Informes_gestion_financiado de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Informes_gestion_financiado en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $informes_gestion_financiadoDao = $FactoryDao->getinformes_gestion_financiadoDao(self::getDataBaseDefault());
        $result = $informes_gestion_financiadoDao->listAll();
        $informes_gestion_financiadoDao->close();
        return $result;
    }

}

//That`s all folks!