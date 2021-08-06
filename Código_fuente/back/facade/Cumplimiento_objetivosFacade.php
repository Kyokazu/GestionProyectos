<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Los animales, asombrados, pasaron su mirada del cerdo al hombre, y del hombre al cerdo; y, nuevamente, del cerdo al hombre; pero ya era imposible distinguir quién era uno y quién era otro.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Cumplimiento_objetivos.php');
require_once realpath('../dao/interfaz/ICumplimiento_objetivosDao.php');

class Cumplimiento_objetivosFacade {

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
   * Crea un objeto Cumplimiento_objetivos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param objetivos_propuestos
   * @param actividades_propuestas
   * @param actividades_desarrolladas
   * @param logros_alcanzados
   * @param porcentaje_cumplimiento
   * @param cumplimiento_objetivoscol
   * @param id_informe_gestion_financiado
   */
  public static function insert($objetivos_propuestos,  $actividades_propuestas,  $actividades_desarrolladas,  $logros_alcanzados,  $porcentaje_cumplimiento, $id_solicitud){
      $cumplimiento_objetivos = new Cumplimiento_objetivos();

      $cumplimiento_objetivos->setObjetivos_propuestos($objetivos_propuestos); 
      $cumplimiento_objetivos->setActividades_propuestas($actividades_propuestas); 
      $cumplimiento_objetivos->setActividades_desarrolladas($actividades_desarrolladas); 
      $cumplimiento_objetivos->setLogros_alcanzados($logros_alcanzados); 
      $cumplimiento_objetivos->setPorcentaje_cumplimiento($porcentaje_cumplimiento); 
      $cumplimiento_objetivos->setId_informe_gestion_financiado($id_solicitud); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cumplimiento_objetivosDao =$FactoryDao->getcumplimiento_objetivosDao(self::getDataBaseDefault());
     $rtn = $cumplimiento_objetivosDao->insert($cumplimiento_objetivos);
     $cumplimiento_objetivosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Cumplimiento_objetivos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $cumplimiento_objetivos = new Cumplimiento_objetivos();
      $cumplimiento_objetivos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cumplimiento_objetivosDao =$FactoryDao->getcumplimiento_objetivosDao(self::getDataBaseDefault());
     $result = $cumplimiento_objetivosDao->select($cumplimiento_objetivos);
     $cumplimiento_objetivosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Cumplimiento_objetivos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param objetivos_propuestos
   * @param actividades_propuestas
   * @param actividades_desarrolladas
   * @param logros_alcanzados
   * @param porcentaje_cumplimiento
   * @param cumplimiento_objetivoscol
   * @param id_informe_gestion_financiado
   */
  public static function update($id, $objetivos_propuestos, $actividades_propuestas, $actividades_desarrolladas, $logros_alcanzados, $porcentaje_cumplimiento, $cumplimiento_objetivoscol, $id_informe_gestion_financiado){
      $cumplimiento_objetivos = self::select($id);
      $cumplimiento_objetivos->setObjetivos_propuestos($objetivos_propuestos); 
      $cumplimiento_objetivos->setActividades_propuestas($actividades_propuestas); 
      $cumplimiento_objetivos->setActividades_desarrolladas($actividades_desarrolladas); 
      $cumplimiento_objetivos->setLogros_alcanzados($logros_alcanzados); 
      $cumplimiento_objetivos->setPorcentaje_cumplimiento($porcentaje_cumplimiento); 
      $cumplimiento_objetivos->setCumplimiento_objetivoscol($cumplimiento_objetivoscol); 
      $cumplimiento_objetivos->setId_informe_gestion_financiado($id_informe_gestion_financiado); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cumplimiento_objetivosDao =$FactoryDao->getcumplimiento_objetivosDao(self::getDataBaseDefault());
     $cumplimiento_objetivosDao->update($cumplimiento_objetivos);
     $cumplimiento_objetivosDao->close();
  }

  /**
   * Elimina un objeto Cumplimiento_objetivos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $cumplimiento_objetivos = new Cumplimiento_objetivos();
      $cumplimiento_objetivos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cumplimiento_objetivosDao =$FactoryDao->getcumplimiento_objetivosDao(self::getDataBaseDefault());
     $cumplimiento_objetivosDao->delete($cumplimiento_objetivos);
     $cumplimiento_objetivosDao->close();
  }

  /**
   * Lista todos los objetos Cumplimiento_objetivos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Cumplimiento_objetivos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cumplimiento_objetivosDao =$FactoryDao->getcumplimiento_objetivosDao(self::getDataBaseDefault());
     $result = $cumplimiento_objetivosDao->listAll();
     $cumplimiento_objetivosDao->close();
     return $result;
  }


}
//That`s all folks!