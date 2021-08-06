<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Contrato.php');
require_once realpath('../dao/interfaz/IContratoDao.php');

class ContratoFacade {

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
     * Crea un objeto Contrato a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param numero_contrato
     * @param acta_comite
     * @param valor_financiado
     * @param fecha_inicio
     * @param fecha_suspension
     * @param fecha_reinicio
     * @param prorroga
     * @param fecha_terminacion
     * @param tiempo_ejecucion
     * @param id_informe_gestion_financiado
     */
    public static function insert($numero_contrato, $acta_comite, $valor_financiado, $fecha_inicio, $fecha_suspension, $fecha_reinicio, $prorroga, $fecha_terminacion, $tiempo_ejecucion, $id_solicitud2) {
        $contrato = new Contrato();
 
        $contrato->setNumero_contrato($numero_contrato);
        $contrato->setActa_comite($acta_comite);
        $contrato->setValor_financiado($valor_financiado);
        $contrato->setFecha_inicio($fecha_inicio);
        $contrato->setFecha_suspension($fecha_suspension);
        $contrato->setFecha_reinicio($fecha_reinicio);
        $contrato->setProrroga($prorroga);
        $contrato->setFecha_terminacion($fecha_terminacion);
        $contrato->setTiempo_ejecucion($tiempo_ejecucion);
        $contrato->setId_informe_gestion_financiado($id_solicitud2);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $contratoDao = $FactoryDao->getcontratoDao(self::getDataBaseDefault());
        $rtn = $contratoDao->insert($contrato);
        $contratoDao->close();
        return $rtn;
    }

    public static function insert_solicitud($numero_contrato, $fecha_inicio, $fecha_terminacion) {
        $contrato = new Contrato();
        $contrato->setNumero_contrato($numero_contrato);
        $contrato->setFecha_inicio($fecha_inicio);
        $contrato->setFecha_terminacion($fecha_terminacion);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $contratoDao = $FactoryDao->getcontratoDao(self::getDataBaseDefault());
        $rtn = $contratoDao->insert2($contrato);
        $contratoDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Contrato de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id) {
        $contrato = new Contrato();
        $contrato->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $contratoDao = $FactoryDao->getcontratoDao(self::getDataBaseDefault());
        $result = $contratoDao->select($contrato);
        $contratoDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Contrato  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param numero_contrato
     * @param acta_comite
     * @param valor_financiado
     * @param fecha_inicio
     * @param fecha_suspension
     * @param fecha_reinicio
     * @param prorroga
     * @param fecha_terminacion
     * @param tiempo_ejecucion
     * @param id_informe_gestion_financiado
     */
    public static function update($id, $numero_contrato, $acta_comite, $valor_financiado, $fecha_inicio, $fecha_suspension, $fecha_reinicio, $prorroga, $fecha_terminacion, $tiempo_ejecucion, $id_informe_gestion_financiado) {
        $contrato = self::select($id);
        $contrato->setNumero_contrato($numero_contrato);
        $contrato->setActa_comite($acta_comite);
        $contrato->setValor_financiado($valor_financiado);
        $contrato->setFecha_inicio($fecha_inicio);
        $contrato->setFecha_suspension($fecha_suspension);
        $contrato->setFecha_reinicio($fecha_reinicio);
        $contrato->setProrroga($prorroga);
        $contrato->setFecha_terminacion($fecha_terminacion);
        $contrato->setTiempo_ejecucion($tiempo_ejecucion);
        $contrato->setId_informe_gestion_financiado($id_informe_gestion_financiado);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $contratoDao = $FactoryDao->getcontratoDao(self::getDataBaseDefault());
        $contratoDao->update($contrato);
        $contratoDao->close();
    }

    /**
     * Elimina un objeto Contrato de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id) {
        $contrato = new Contrato();
        $contrato->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $contratoDao = $FactoryDao->getcontratoDao(self::getDataBaseDefault());
        $contratoDao->delete($contrato);
        $contratoDao->close();
    }

    /**
     * Lista todos los objetos Contrato de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Contrato en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $contratoDao = $FactoryDao->getcontratoDao(self::getDataBaseDefault());
        $result = $contratoDao->listAll();
        $contratoDao->close();
        return $result;
    }

}

//That`s all folks!