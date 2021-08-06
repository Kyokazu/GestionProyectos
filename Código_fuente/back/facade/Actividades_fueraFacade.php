<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Actividades_fuera.php');
require_once realpath('../dao/interfaz/IActividades_fueraDao.php');
require_once realpath('../dto/Proyectos.php');

class Actividades_fueraFacade {

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
   * Crea un objeto Actividades_fuera a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param proyectos_id
   */
  public static function insert( $id,  $descripcion,  $proyectos_id){
      $actividades_fuera = new Actividades_fuera();
      $actividades_fuera->setId($id); 
      $actividades_fuera->setDescripcion($descripcion); 
      $actividades_fuera->setProyectos_id($proyectos_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividades_fueraDao =$FactoryDao->getactividades_fueraDao(self::getDataBaseDefault());
     $rtn = $actividades_fueraDao->insert($actividades_fuera);
     $actividades_fueraDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Actividades_fuera de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $actividades_fuera = new Actividades_fuera();
      $actividades_fuera->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividades_fueraDao =$FactoryDao->getactividades_fueraDao(self::getDataBaseDefault());
     $result = $actividades_fueraDao->select($actividades_fuera);
     $actividades_fueraDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Actividades_fuera  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param proyectos_id
   */
  public static function update($id, $descripcion, $proyectos_id){
      $actividades_fuera = self::select($id);
      $actividades_fuera->setDescripcion($descripcion); 
      $actividades_fuera->setProyectos_id($proyectos_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividades_fueraDao =$FactoryDao->getactividades_fueraDao(self::getDataBaseDefault());
     $actividades_fueraDao->update($actividades_fuera);
     $actividades_fueraDao->close();
  }

  /**
   * Elimina un objeto Actividades_fuera de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $actividades_fuera = new Actividades_fuera();
      $actividades_fuera->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividades_fueraDao =$FactoryDao->getactividades_fueraDao(self::getDataBaseDefault());
     $actividades_fueraDao->delete($actividades_fuera);
     $actividades_fueraDao->close();
  }

  /**
   * Lista todos los objetos Actividades_fuera de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Actividades_fuera en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividades_fueraDao =$FactoryDao->getactividades_fueraDao(self::getDataBaseDefault());
     $result = $actividades_fueraDao->listAll();
     $actividades_fueraDao->close();
     return $result;
  }


}
//That`s all folks!