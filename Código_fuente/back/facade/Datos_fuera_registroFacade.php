<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ͡~ ͜ʖ ͡°)  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Datos_fuera_registro.php');
require_once realpath('../dao/interfaz/IDatos_fuera_registroDao.php');
require_once realpath('../dto/Informe_gestion_semillero.php');

class Datos_fuera_registroFacade {

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
   * Crea un objeto Datos_fuera_registro a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param producto
   * @param descripcion
   * @param responsable
   * @param fecha
   * @param informe_gestion_semillero_id
   */
  public static function insert( $id,  $producto,  $descripcion,  $responsable,  $fecha,  $informe_gestion_semillero_id){
      $datos_fuera_registro = new Datos_fuera_registro();
      $datos_fuera_registro->setId($id); 
      $datos_fuera_registro->setProducto($producto); 
      $datos_fuera_registro->setDescripcion($descripcion); 
      $datos_fuera_registro->setResponsable($responsable); 
      $datos_fuera_registro->setFecha($fecha); 
      $datos_fuera_registro->setInforme_gestion_semillero_id($informe_gestion_semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_fuera_registroDao =$FactoryDao->getdatos_fuera_registroDao(self::getDataBaseDefault());
     $rtn = $datos_fuera_registroDao->insert($datos_fuera_registro);
     $datos_fuera_registroDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Datos_fuera_registro de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $datos_fuera_registro = new Datos_fuera_registro();
      $datos_fuera_registro->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_fuera_registroDao =$FactoryDao->getdatos_fuera_registroDao(self::getDataBaseDefault());
     $result = $datos_fuera_registroDao->select($datos_fuera_registro);
     $datos_fuera_registroDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Datos_fuera_registro  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param producto
   * @param descripcion
   * @param responsable
   * @param fecha
   * @param informe_gestion_semillero_id
   */
  public static function update($id, $producto, $descripcion, $responsable, $fecha, $informe_gestion_semillero_id){
      $datos_fuera_registro = self::select($id);
      $datos_fuera_registro->setProducto($producto); 
      $datos_fuera_registro->setDescripcion($descripcion); 
      $datos_fuera_registro->setResponsable($responsable); 
      $datos_fuera_registro->setFecha($fecha); 
      $datos_fuera_registro->setInforme_gestion_semillero_id($informe_gestion_semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_fuera_registroDao =$FactoryDao->getdatos_fuera_registroDao(self::getDataBaseDefault());
     $datos_fuera_registroDao->update($datos_fuera_registro);
     $datos_fuera_registroDao->close();
  }

  /**
   * Elimina un objeto Datos_fuera_registro de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $datos_fuera_registro = new Datos_fuera_registro();
      $datos_fuera_registro->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_fuera_registroDao =$FactoryDao->getdatos_fuera_registroDao(self::getDataBaseDefault());
     $datos_fuera_registroDao->delete($datos_fuera_registro);
     $datos_fuera_registroDao->close();
  }

  /**
   * Lista todos los objetos Datos_fuera_registro de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Datos_fuera_registro en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_fuera_registroDao =$FactoryDao->getdatos_fuera_registroDao(self::getDataBaseDefault());
     $result = $datos_fuera_registroDao->listAll();
     $datos_fuera_registroDao->close();
     return $result;
  }


}
//That`s all folks!