<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Has encontrado la frase #1024 ¡Felicidades! Ahora tu proyecto funcionará a la primera  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Cumplimiento_cronograma.php');
require_once realpath('../dao/interfaz/ICumplimiento_cronogramaDao.php');

class Cumplimiento_cronogramaFacade {

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
     * Crea un objeto Cumplimiento_cronograma a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param objetivo
     * @param actividades
     * @param estado
     * @param semestre
     * @param id_informe_gestion_financiado
     */
    public static function insert($objetivo, $actividades, $estado, $semestre, $id_informe_gestion_financiado) {
        $cumplimiento_cronograma = new Cumplimiento_cronograma();

        $cumplimiento_cronograma->setObjetivo($objetivo);
        $cumplimiento_cronograma->setActividades($actividades);
        $cumplimiento_cronograma->setEstado($estado);
        $cumplimiento_cronograma->setSemestre($semestre);
        $cumplimiento_cronograma->setId_informe_gestion_financiado($id_informe_gestion_financiado);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_cronogramaDao = $FactoryDao->getcumplimiento_cronogramaDao(self::getDataBaseDefault());
        $rtn = $cumplimiento_cronogramaDao->insert($cumplimiento_cronograma);
        $cumplimiento_cronogramaDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Cumplimiento_cronograma de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id) {
        $cumplimiento_cronograma = new Cumplimiento_cronograma();
        $cumplimiento_cronograma->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_cronogramaDao = $FactoryDao->getcumplimiento_cronogramaDao(self::getDataBaseDefault());
        $result = $cumplimiento_cronogramaDao->select($cumplimiento_cronograma);
        $cumplimiento_cronogramaDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Cumplimiento_cronograma  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param objetivo
     * @param actividades
     * @param estado
     * @param semestre
     * @param id_informe_gestion_financiado
     */
    public static function update($id, $objetivo, $actividades, $estado, $semestre, $id_informe_gestion_financiado) {
        $cumplimiento_cronograma = self::select($id);
        $cumplimiento_cronograma->setObjetivo($objetivo);
        $cumplimiento_cronograma->setActividades($actividades);
        $cumplimiento_cronograma->setEstado($estado);
        $cumplimiento_cronograma->setSemestre($semestre);
        $cumplimiento_cronograma->setId_informe_gestion_financiado($id_informe_gestion_financiado);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_cronogramaDao = $FactoryDao->getcumplimiento_cronogramaDao(self::getDataBaseDefault());
        $cumplimiento_cronogramaDao->update($cumplimiento_cronograma);
        $cumplimiento_cronogramaDao->close();
    }

    /**
     * Elimina un objeto Cumplimiento_cronograma de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id) {
        $cumplimiento_cronograma = new Cumplimiento_cronograma();
        $cumplimiento_cronograma->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_cronogramaDao = $FactoryDao->getcumplimiento_cronogramaDao(self::getDataBaseDefault());
        $cumplimiento_cronogramaDao->delete($cumplimiento_cronograma);
        $cumplimiento_cronogramaDao->close();
    }

    /**
     * Lista todos los objetos Cumplimiento_cronograma de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Cumplimiento_cronograma en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $cumplimiento_cronogramaDao = $FactoryDao->getcumplimiento_cronogramaDao(self::getDataBaseDefault());
        $result = $cumplimiento_cronogramaDao->listAll();
        $cumplimiento_cronogramaDao->close();
        return $result;
    }

}

//That`s all folks!