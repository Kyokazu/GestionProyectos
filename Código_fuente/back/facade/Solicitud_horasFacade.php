<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    They call me Mr. Espagueti  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Solicitud_horas.php');
require_once realpath('../dao/interfaz/ISolicitud_horasDao.php');

class Solicitud_horasFacade {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Solicitud_horas a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param anio
   * @param semestre
   * @param horas_catedra
   * @param horas_planta
   * @param horas_solicitadas
   */
  public static function insert( $id,  $anio,  $semestre,  $horas_catedra,  $horas_planta,  $horas_solicitadas){
      $solicitud_horas = new Solicitud_horas();
      $solicitud_horas->setId($id); 
      $solicitud_horas->setAnio($anio); 
      $solicitud_horas->setSemestre($semestre); 
      $solicitud_horas->setHoras_catedra($horas_catedra); 
      $solicitud_horas->setHoras_planta($horas_planta); 
      $solicitud_horas->setHoras_solicitadas($horas_solicitadas); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $solicitud_horasDao =$FactoryDao->getsolicitud_horasDao(self::getDataBaseDefault());
     $rtn = $solicitud_horasDao->insert($solicitud_horas);
     $solicitud_horasDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Solicitud_horas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $solicitud_horas = new Solicitud_horas();
      $solicitud_horas->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $solicitud_horasDao =$FactoryDao->getsolicitud_horasDao(self::getDataBaseDefault());
     $result = $solicitud_horasDao->select($solicitud_horas);
     $solicitud_horasDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Solicitud_horas  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param anio
   * @param semestre
   * @param horas_catedra
   * @param horas_planta
   * @param horas_solicitadas
   */
  public static function update($id, $anio, $semestre, $horas_catedra, $horas_planta, $horas_solicitadas){
      $solicitud_horas = self::select($id);
      $solicitud_horas->setAnio($anio); 
      $solicitud_horas->setSemestre($semestre); 
      $solicitud_horas->setHoras_catedra($horas_catedra); 
      $solicitud_horas->setHoras_planta($horas_planta); 
      $solicitud_horas->setHoras_solicitadas($horas_solicitadas); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $solicitud_horasDao =$FactoryDao->getsolicitud_horasDao(self::getDataBaseDefault());
     $solicitud_horasDao->update($solicitud_horas);
     $solicitud_horasDao->close();
  }

  /**
   * Elimina un objeto Solicitud_horas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $solicitud_horas = new Solicitud_horas();
      $solicitud_horas->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $solicitud_horasDao =$FactoryDao->getsolicitud_horasDao(self::getDataBaseDefault());
     $solicitud_horasDao->delete($solicitud_horas);
     $solicitud_horasDao->close();
  }

  /**
   * Lista todos los objetos Solicitud_horas de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Solicitud_horas en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $solicitud_horasDao =$FactoryDao->getsolicitud_horasDao(self::getDataBaseDefault());
     $result = $solicitud_horasDao->listAll();
     $solicitud_horasDao->close();
     return $result;
  }


}
//That`s all folks!