<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Datos_.php');
require_once realpath('../dao/interfaz/IDatos_Dao.php');
require_once realpath('../dto/Semillero.php');

class Datos_Facade {

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
   * Crea un objeto Datos_ a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre_proyecto
   * @param nombre_actividad
   * @param modalidad_participacion
   * @param responsable
   * @param fecha_realizacion
   * @param producto
   * @param semillero_id
   */
  public static function insert( $id,  $nombre_proyecto,  $nombre_actividad,  $modalidad_participacion,  $responsable,  $fecha_realizacion,  $producto,  $semillero_id){
      $datos_ = new Datos_();
      $datos_->setId($id); 
      $datos_->setNombre_proyecto($nombre_proyecto); 
      $datos_->setNombre_actividad($nombre_actividad); 
      $datos_->setModalidad_participacion($modalidad_participacion); 
      $datos_->setResponsable($responsable); 
      $datos_->setFecha_realizacion($fecha_realizacion); 
      $datos_->setProducto($producto); 
      $datos_->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_Dao =$FactoryDao->getdatos_Dao(self::getDataBaseDefault());
     $rtn = $datos_Dao->insert($datos_);
     $datos_Dao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Datos_ de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $datos_ = new Datos_();
      $datos_->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_Dao =$FactoryDao->getdatos_Dao(self::getDataBaseDefault());
     $result = $datos_Dao->select($datos_);
     $datos_Dao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Datos_  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre_proyecto
   * @param nombre_actividad
   * @param modalidad_participacion
   * @param responsable
   * @param fecha_realizacion
   * @param producto
   * @param semillero_id
   */
  public static function update($id, $nombre_proyecto, $nombre_actividad, $modalidad_participacion, $responsable, $fecha_realizacion, $producto, $semillero_id){
      $datos_ = self::select($id);
      $datos_->setNombre_proyecto($nombre_proyecto); 
      $datos_->setNombre_actividad($nombre_actividad); 
      $datos_->setModalidad_participacion($modalidad_participacion); 
      $datos_->setResponsable($responsable); 
      $datos_->setFecha_realizacion($fecha_realizacion); 
      $datos_->setProducto($producto); 
      $datos_->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_Dao =$FactoryDao->getdatos_Dao(self::getDataBaseDefault());
     $datos_Dao->update($datos_);
     $datos_Dao->close();
  }

  /**
   * Elimina un objeto Datos_ de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $datos_ = new Datos_();
      $datos_->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_Dao =$FactoryDao->getdatos_Dao(self::getDataBaseDefault());
     $datos_Dao->delete($datos_);
     $datos_Dao->close();
  }

  /**
   * Lista todos los objetos Datos_ de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Datos_ en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_Dao =$FactoryDao->getdatos_Dao(self::getDataBaseDefault());
     $result = $datos_Dao->listAll();
     $datos_Dao->close();
     return $result;
  }


}
//That`s all folks!