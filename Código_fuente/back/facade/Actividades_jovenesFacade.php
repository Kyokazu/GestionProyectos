<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Actividades_jovenes.php');
require_once realpath('../dao/interfaz/IActividades_jovenesDao.php');

class Actividades_jovenesFacade {

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
   * Crea un objeto Actividades_jovenes a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param actividades_desarrolladas
   * @param productos_alcanzados
   * @param semestre
   * @param id_informe_gestion_jovenes
   */
  public static function insert($actividades_desarrolladas,  $productos_alcanzados,  $semestre,  $id_informe_gestion_jovenes){
      $actividades_jovenes = new Actividades_jovenes();

      $actividades_jovenes->setActividades_desarrolladas($actividades_desarrolladas); 
      $actividades_jovenes->setProductos_alcanzados($productos_alcanzados); 
      $actividades_jovenes->setSemestre($semestre); 
      $actividades_jovenes->setId_informe_gestion_jovenes($id_informe_gestion_jovenes); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividades_jovenesDao =$FactoryDao->getactividades_jovenesDao(self::getDataBaseDefault());
     $rtn = $actividades_jovenesDao->insert($actividades_jovenes);
     $actividades_jovenesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Actividades_jovenes de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $actividades_jovenes = new Actividades_jovenes();
      $actividades_jovenes->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividades_jovenesDao =$FactoryDao->getactividades_jovenesDao(self::getDataBaseDefault());
     $result = $actividades_jovenesDao->select($actividades_jovenes);
     $actividades_jovenesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Actividades_jovenes  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param actividades_desarrolladas
   * @param productos_alcanzados
   * @param semestre
   * @param id_informe_gestion_jovenes
   */
  public static function update($id, $actividades_desarrolladas, $productos_alcanzados, $semestre, $id_informe_gestion_jovenes){
      $actividades_jovenes = self::select($id);
      $actividades_jovenes->setActividades_desarrolladas($actividades_desarrolladas); 
      $actividades_jovenes->setProductos_alcanzados($productos_alcanzados); 
      $actividades_jovenes->setSemestre($semestre); 
      $actividades_jovenes->setId_informe_gestion_jovenes($id_informe_gestion_jovenes); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividades_jovenesDao =$FactoryDao->getactividades_jovenesDao(self::getDataBaseDefault());
     $actividades_jovenesDao->update($actividades_jovenes);
     $actividades_jovenesDao->close();
  }

  /**
   * Elimina un objeto Actividades_jovenes de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $actividades_jovenes = new Actividades_jovenes();
      $actividades_jovenes->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividades_jovenesDao =$FactoryDao->getactividades_jovenesDao(self::getDataBaseDefault());
     $actividades_jovenesDao->delete($actividades_jovenes);
     $actividades_jovenesDao->close();
  }

  /**
   * Lista todos los objetos Actividades_jovenes de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Actividades_jovenes en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividades_jovenesDao =$FactoryDao->getactividades_jovenesDao(self::getDataBaseDefault());
     $result = $actividades_jovenesDao->listAll();
     $actividades_jovenesDao->close();
     return $result;
  }


}
//That`s all folks!