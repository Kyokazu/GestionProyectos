<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿No es más sencillo hacer todo en el Main?  \\

include_once realpath('../dao/interfaz/IDatos_fuera_registroDao.php');
include_once realpath('../dto/Datos_fuera_registro.php');
include_once realpath('../dto/Informe_gestion_semillero.php');

class Datos_fuera_registroDao implements IDatos_fuera_registroDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Datos_fuera_registro en la base de datos.
     * @param datos_fuera_registro objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($datos_fuera_registro){
      $id=$datos_fuera_registro->getId();
$producto=$datos_fuera_registro->getProducto();
$descripcion=$datos_fuera_registro->getDescripcion();
$responsable=$datos_fuera_registro->getResponsable();
$fecha=$datos_fuera_registro->getFecha();
$informe_gestion_semillero_id=$datos_fuera_registro->getInforme_gestion_semillero_id()->getId();

      try {
          $sql= "INSERT INTO `datos_fuera_registro`( `id`, `producto`, `descripcion`, `responsable`, `fecha`, `informe_gestion_semillero_id`)"
          ."VALUES ('$id','$producto','$descripcion','$responsable','$fecha','$informe_gestion_semillero_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Datos_fuera_registro en la base de datos.
     * @param datos_fuera_registro objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($datos_fuera_registro){
      $id=$datos_fuera_registro->getId();

      try {
          $sql= "SELECT `id`, `producto`, `descripcion`, `responsable`, `fecha`, `informe_gestion_semillero_id`"
          ."FROM `datos_fuera_registro`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $datos_fuera_registro->setId($data[$i]['id']);
          $datos_fuera_registro->setProducto($data[$i]['producto']);
          $datos_fuera_registro->setDescripcion($data[$i]['descripcion']);
          $datos_fuera_registro->setResponsable($data[$i]['responsable']);
          $datos_fuera_registro->setFecha($data[$i]['fecha']);
           $informe_gestion_semillero = new Informe_gestion_semillero();
           $informe_gestion_semillero->setId($data[$i]['informe_gestion_semillero_id']);
           $datos_fuera_registro->setInforme_gestion_semillero_id($informe_gestion_semillero);

          }
      return $datos_fuera_registro;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Datos_fuera_registro en la base de datos.
     * @param datos_fuera_registro objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($datos_fuera_registro){
      $id=$datos_fuera_registro->getId();
$producto=$datos_fuera_registro->getProducto();
$descripcion=$datos_fuera_registro->getDescripcion();
$responsable=$datos_fuera_registro->getResponsable();
$fecha=$datos_fuera_registro->getFecha();
$informe_gestion_semillero_id=$datos_fuera_registro->getInforme_gestion_semillero_id()->getId();

      try {
          $sql= "UPDATE `datos_fuera_registro` SET`id`='$id' ,`producto`='$producto' ,`descripcion`='$descripcion' ,`responsable`='$responsable' ,`fecha`='$fecha' ,`informe_gestion_semillero_id`='$informe_gestion_semillero_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Datos_fuera_registro en la base de datos.
     * @param datos_fuera_registro objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($datos_fuera_registro){
      $id=$datos_fuera_registro->getId();

      try {
          $sql ="DELETE FROM `datos_fuera_registro` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Datos_fuera_registro en la base de datos.
     * @return ArrayList<Datos_fuera_registro> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `producto`, `descripcion`, `responsable`, `fecha`, `informe_gestion_semillero_id`"
          ."FROM `datos_fuera_registro`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $datos_fuera_registro= new Datos_fuera_registro();
          $datos_fuera_registro->setId($data[$i]['id']);
          $datos_fuera_registro->setProducto($data[$i]['producto']);
          $datos_fuera_registro->setDescripcion($data[$i]['descripcion']);
          $datos_fuera_registro->setResponsable($data[$i]['responsable']);
          $datos_fuera_registro->setFecha($data[$i]['fecha']);
           $informe_gestion_semillero = new Informe_gestion_semillero();
           $informe_gestion_semillero->setId($data[$i]['informe_gestion_semillero_id']);
           $datos_fuera_registro->setInforme_gestion_semillero_id($informe_gestion_semillero);

          array_push($lista,$datos_fuera_registro);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!