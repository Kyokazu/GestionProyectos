<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El código es tuyo, modifícalo como quieras  \\

include_once realpath('../dao/interfaz/IDatos_Dao.php');
include_once realpath('../dto/Datos_.php');
include_once realpath('../dto/Semillero.php');

class Datos_Dao implements IDatos_Dao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Datos_ en la base de datos.
     * @param datos_ objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($datos_){
      $id=$datos_->getId();
$nombre_proyecto=$datos_->getNombre_proyecto();
$nombre_actividad=$datos_->getNombre_actividad();
$modalidad_participacion=$datos_->getModalidad_participacion();
$responsable=$datos_->getResponsable();
$fecha_realizacion=$datos_->getFecha_realizacion();
$producto=$datos_->getProducto();
$semillero_id=$datos_->getSemillero_id()->getId();

      try {
          $sql= "INSERT INTO `datos_`( `id`, `nombre_proyecto`, `nombre_actividad`, `modalidad_participacion`, `responsable`, `fecha_realizacion`, `producto`, `semillero_id`)"
          ."VALUES ('$id','$nombre_proyecto','$nombre_actividad','$modalidad_participacion','$responsable','$fecha_realizacion','$producto','$semillero_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Datos_ en la base de datos.
     * @param datos_ objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($datos_){
      $id=$datos_->getId();

      try {
          $sql= "SELECT `id`, `nombre_proyecto`, `nombre_actividad`, `modalidad_participacion`, `responsable`, `fecha_realizacion`, `producto`, `semillero_id`"
          ."FROM `datos_`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $datos_->setId($data[$i]['id']);
          $datos_->setNombre_proyecto($data[$i]['nombre_proyecto']);
          $datos_->setNombre_actividad($data[$i]['nombre_actividad']);
          $datos_->setModalidad_participacion($data[$i]['modalidad_participacion']);
          $datos_->setResponsable($data[$i]['responsable']);
          $datos_->setFecha_realizacion($data[$i]['fecha_realizacion']);
          $datos_->setProducto($data[$i]['producto']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $datos_->setSemillero_id($semillero);

          }
      return $datos_;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Datos_ en la base de datos.
     * @param datos_ objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($datos_){
      $id=$datos_->getId();
$nombre_proyecto=$datos_->getNombre_proyecto();
$nombre_actividad=$datos_->getNombre_actividad();
$modalidad_participacion=$datos_->getModalidad_participacion();
$responsable=$datos_->getResponsable();
$fecha_realizacion=$datos_->getFecha_realizacion();
$producto=$datos_->getProducto();
$semillero_id=$datos_->getSemillero_id()->getId();

      try {
          $sql= "UPDATE `datos_` SET`id`='$id' ,`nombre_proyecto`='$nombre_proyecto' ,`nombre_actividad`='$nombre_actividad' ,`modalidad_participacion`='$modalidad_participacion' ,`responsable`='$responsable' ,`fecha_realizacion`='$fecha_realizacion' ,`producto`='$producto' ,`semillero_id`='$semillero_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Datos_ en la base de datos.
     * @param datos_ objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($datos_){
      $id=$datos_->getId();

      try {
          $sql ="DELETE FROM `datos_` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Datos_ en la base de datos.
     * @return ArrayList<Datos_> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre_proyecto`, `nombre_actividad`, `modalidad_participacion`, `responsable`, `fecha_realizacion`, `producto`, `semillero_id`"
          ."FROM `datos_`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $datos_= new Datos_();
          $datos_->setId($data[$i]['id']);
          $datos_->setNombre_proyecto($data[$i]['nombre_proyecto']);
          $datos_->setNombre_actividad($data[$i]['nombre_actividad']);
          $datos_->setModalidad_participacion($data[$i]['modalidad_participacion']);
          $datos_->setResponsable($data[$i]['responsable']);
          $datos_->setFecha_realizacion($data[$i]['fecha_realizacion']);
          $datos_->setProducto($data[$i]['producto']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $datos_->setSemillero_id($semillero);

          array_push($lista,$datos_);
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