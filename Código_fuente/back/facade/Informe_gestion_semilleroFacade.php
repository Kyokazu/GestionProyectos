<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tenemos trabajos que odiamos para comprar cosas que no necesitamos.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Informe_gestion_semillero.php');
require_once realpath('../dao/interfaz/IInforme_gestion_semilleroDao.php');
require_once realpath('../dto/Capacitaciones.php');
require_once realpath('../dto/Proyectos.php');

class Informe_gestion_semilleroFacade {

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
   * Crea un objeto Informe_gestion_semillero a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param fecha
   * @param semestre
   * @param capacitaciones_id
   * @param proyectos_id
   */
  public static function insert( $id,  $fecha,  $semestre,  $capacitaciones_id,  $proyectos_id){
      $informe_gestion_semillero = new Informe_gestion_semillero();
      $informe_gestion_semillero->setId($id); 
      $informe_gestion_semillero->setFecha($fecha); 
      $informe_gestion_semillero->setSemestre($semestre); 
      $informe_gestion_semillero->setCapacitaciones_id($capacitaciones_id); 
      $informe_gestion_semillero->setProyectos_id($proyectos_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $informe_gestion_semilleroDao =$FactoryDao->getinforme_gestion_semilleroDao(self::getDataBaseDefault());
     $rtn = $informe_gestion_semilleroDao->insert($informe_gestion_semillero);
     $informe_gestion_semilleroDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Informe_gestion_semillero de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $informe_gestion_semillero = new Informe_gestion_semillero();
      $informe_gestion_semillero->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $informe_gestion_semilleroDao =$FactoryDao->getinforme_gestion_semilleroDao(self::getDataBaseDefault());
     $result = $informe_gestion_semilleroDao->select($informe_gestion_semillero);
     $informe_gestion_semilleroDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Informe_gestion_semillero  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param fecha
   * @param semestre
   * @param capacitaciones_id
   * @param proyectos_id
   */
  public static function update($id, $fecha, $semestre, $capacitaciones_id, $proyectos_id){
      $informe_gestion_semillero = self::select($id);
      $informe_gestion_semillero->setFecha($fecha); 
      $informe_gestion_semillero->setSemestre($semestre); 
      $informe_gestion_semillero->setCapacitaciones_id($capacitaciones_id); 
      $informe_gestion_semillero->setProyectos_id($proyectos_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $informe_gestion_semilleroDao =$FactoryDao->getinforme_gestion_semilleroDao(self::getDataBaseDefault());
     $informe_gestion_semilleroDao->update($informe_gestion_semillero);
     $informe_gestion_semilleroDao->close();
  }

  /**
   * Elimina un objeto Informe_gestion_semillero de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $informe_gestion_semillero = new Informe_gestion_semillero();
      $informe_gestion_semillero->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $informe_gestion_semilleroDao =$FactoryDao->getinforme_gestion_semilleroDao(self::getDataBaseDefault());
     $informe_gestion_semilleroDao->delete($informe_gestion_semillero);
     $informe_gestion_semilleroDao->close();
  }

  /**
   * Lista todos los objetos Informe_gestion_semillero de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Informe_gestion_semillero en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $informe_gestion_semilleroDao =$FactoryDao->getinforme_gestion_semilleroDao(self::getDataBaseDefault());
     $result = $informe_gestion_semilleroDao->listAll();
     $informe_gestion_semilleroDao->close();
     return $result;
  }


}
//That`s all folks!