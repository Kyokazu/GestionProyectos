<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...Y como plato principal: ¡Código espagueti!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Impactos_sociales.php');
require_once realpath('../dao/interfaz/IImpactos_socialesDao.php');

class Impactos_socialesFacade {

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
   * Crea un objeto Impactos_sociales a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param impacto_1
   * @param impacto_2
   * @param impacto_3
   * @param impacto_4
   * @param impacto_5
   * @param impacto_6
   * @param impacto_7
   * @param id_informe_gestion_financiado
   */
  public static function insert($impacto_1,  $impacto_2,  $impacto_3,  $impacto_4,  $impacto_5,  $impacto_6,  $impacto_7,  $id_informe_gestion_financiado){
      $impactos_sociales = new Impactos_sociales();

      $impactos_sociales->setImpacto_1($impacto_1); 
      $impactos_sociales->setImpacto_2($impacto_2); 
      $impactos_sociales->setImpacto_3($impacto_3); 
      $impactos_sociales->setImpacto_4($impacto_4); 
      $impactos_sociales->setImpacto_5($impacto_5); 
      $impactos_sociales->setImpacto_6($impacto_6); 
      $impactos_sociales->setImpacto_7($impacto_7); 
      $impactos_sociales->setId_informe_gestion_financiado($id_informe_gestion_financiado); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $impactos_socialesDao =$FactoryDao->getimpactos_socialesDao(self::getDataBaseDefault());
     $rtn = $impactos_socialesDao->insert($impactos_sociales);
     $impactos_socialesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Impactos_sociales de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $impactos_sociales = new Impactos_sociales();
      $impactos_sociales->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $impactos_socialesDao =$FactoryDao->getimpactos_socialesDao(self::getDataBaseDefault());
     $result = $impactos_socialesDao->select($impactos_sociales);
     $impactos_socialesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Impactos_sociales  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param impacto_1
   * @param impacto_2
   * @param impacto_3
   * @param impacto_4
   * @param impacto_5
   * @param impacto_6
   * @param impacto_7
   * @param id_informe_gestion_financiado
   */
  public static function update($id, $impacto_1, $impacto_2, $impacto_3, $impacto_4, $impacto_5, $impacto_6, $impacto_7, $id_informe_gestion_financiado){
      $impactos_sociales = self::select($id);
      $impactos_sociales->setImpacto_1($impacto_1); 
      $impactos_sociales->setImpacto_2($impacto_2); 
      $impactos_sociales->setImpacto_3($impacto_3); 
      $impactos_sociales->setImpacto_4($impacto_4); 
      $impactos_sociales->setImpacto_5($impacto_5); 
      $impactos_sociales->setImpacto_6($impacto_6); 
      $impactos_sociales->setImpacto_7($impacto_7); 
      $impactos_sociales->setId_informe_gestion_financiado($id_informe_gestion_financiado); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $impactos_socialesDao =$FactoryDao->getimpactos_socialesDao(self::getDataBaseDefault());
     $impactos_socialesDao->update($impactos_sociales);
     $impactos_socialesDao->close();
  }

  /**
   * Elimina un objeto Impactos_sociales de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $impactos_sociales = new Impactos_sociales();
      $impactos_sociales->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $impactos_socialesDao =$FactoryDao->getimpactos_socialesDao(self::getDataBaseDefault());
     $impactos_socialesDao->delete($impactos_sociales);
     $impactos_socialesDao->close();
  }

  /**
   * Lista todos los objetos Impactos_sociales de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Impactos_sociales en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $impactos_socialesDao =$FactoryDao->getimpactos_socialesDao(self::getDataBaseDefault());
     $result = $impactos_socialesDao->listAll();
     $impactos_socialesDao->close();
     return $result;
  }


}
//That`s all folks!