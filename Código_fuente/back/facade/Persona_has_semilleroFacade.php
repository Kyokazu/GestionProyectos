<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Oh gloria de las glorias, oh divino testamento de la eterna majestad de la creación de dios  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Persona_has_semillero.php');
require_once realpath('../dao/interfaz/IPersona_has_semilleroDao.php');
require_once realpath('../dto/Persona.php');
require_once realpath('../dto/Semillero.php');

class Persona_has_semilleroFacade {

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
   * Crea un objeto Persona_has_semillero a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param persona_id
   * @param semillero_id
   */
  public static function insert( $id,  $persona_id,  $semillero_id){
      $persona_has_semillero = new Persona_has_semillero();
      $persona_has_semillero->setId($id); 
      $persona_has_semillero->setPersona_id($persona_id); 
      $persona_has_semillero->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_semilleroDao =$FactoryDao->getpersona_has_semilleroDao(self::getDataBaseDefault());
     $rtn = $persona_has_semilleroDao->insert($persona_has_semillero);
     $persona_has_semilleroDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Persona_has_semillero de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $persona_has_semillero = new Persona_has_semillero();
      $persona_has_semillero->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_semilleroDao =$FactoryDao->getpersona_has_semilleroDao(self::getDataBaseDefault());
     $result = $persona_has_semilleroDao->select($persona_has_semillero);
     $persona_has_semilleroDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Persona_has_semillero  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param persona_id
   * @param semillero_id
   */
  public static function update($id, $persona_id, $semillero_id){
      $persona_has_semillero = self::select($id);
      $persona_has_semillero->setPersona_id($persona_id); 
      $persona_has_semillero->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_semilleroDao =$FactoryDao->getpersona_has_semilleroDao(self::getDataBaseDefault());
     $persona_has_semilleroDao->update($persona_has_semillero);
     $persona_has_semilleroDao->close();
  }

  /**
   * Elimina un objeto Persona_has_semillero de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $persona_has_semillero = new Persona_has_semillero();
      $persona_has_semillero->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_semilleroDao =$FactoryDao->getpersona_has_semilleroDao(self::getDataBaseDefault());
     $persona_has_semilleroDao->delete($persona_has_semillero);
     $persona_has_semilleroDao->close();
  }

  /**
   * Lista todos los objetos Persona_has_semillero de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Persona_has_semillero en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_semilleroDao =$FactoryDao->getpersona_has_semilleroDao(self::getDataBaseDefault());
     $result = $persona_has_semilleroDao->listAll();
     $persona_has_semilleroDao->close();
     return $result;
  }


}
//That`s all folks!