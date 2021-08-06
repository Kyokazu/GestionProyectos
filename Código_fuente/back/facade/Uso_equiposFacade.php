<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla del proyecto es no hacer preguntas  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Uso_equipos.php');
require_once realpath('../dao/interfaz/IUso_equiposDao.php');

class Uso_equiposFacade {

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
   * Crea un objeto Uso_equipos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param equipo
   * @param proyecto
   * @param otro_proyecto
   * @param uso_posterior
   * @param id_informe_gestion_financiado
   */
  public static function insert( $equipo,  $proyecto,  $otro_proyecto,  $uso_posterior,  $id_informe_gestion_financiado){
      $uso_equipos = new Uso_equipos();

      $uso_equipos->setEquipo($equipo); 
      $uso_equipos->setProyecto($proyecto); 
      $uso_equipos->setOtro_proyecto($otro_proyecto); 
      $uso_equipos->setUso_posterior($uso_posterior); 
      $uso_equipos->setId_informe_gestion_financiado($id_informe_gestion_financiado); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $uso_equiposDao =$FactoryDao->getuso_equiposDao(self::getDataBaseDefault());
     $rtn = $uso_equiposDao->insert($uso_equipos);
     $uso_equiposDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Uso_equipos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $uso_equipos = new Uso_equipos();
      $uso_equipos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $uso_equiposDao =$FactoryDao->getuso_equiposDao(self::getDataBaseDefault());
     $result = $uso_equiposDao->select($uso_equipos);
     $uso_equiposDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Uso_equipos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param equipo
   * @param proyecto
   * @param otro_proyecto
   * @param uso_posterior
   * @param id_informe_gestion_financiado
   */
  public static function update($id, $equipo, $proyecto, $otro_proyecto, $uso_posterior, $id_informe_gestion_financiado){
      $uso_equipos = self::select($id);
      $uso_equipos->setEquipo($equipo); 
      $uso_equipos->setProyecto($proyecto); 
      $uso_equipos->setOtro_proyecto($otro_proyecto); 
      $uso_equipos->setUso_posterior($uso_posterior); 
      $uso_equipos->setId_informe_gestion_financiado($id_informe_gestion_financiado); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $uso_equiposDao =$FactoryDao->getuso_equiposDao(self::getDataBaseDefault());
     $uso_equiposDao->update($uso_equipos);
     $uso_equiposDao->close();
  }

  /**
   * Elimina un objeto Uso_equipos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $uso_equipos = new Uso_equipos();
      $uso_equipos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $uso_equiposDao =$FactoryDao->getuso_equiposDao(self::getDataBaseDefault());
     $uso_equiposDao->delete($uso_equipos);
     $uso_equiposDao->close();
  }

  /**
   * Lista todos los objetos Uso_equipos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Uso_equipos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $uso_equiposDao =$FactoryDao->getuso_equiposDao(self::getDataBaseDefault());
     $result = $uso_equiposDao->listAll();
     $uso_equiposDao->close();
     return $result;
  }


}
//That`s all folks!