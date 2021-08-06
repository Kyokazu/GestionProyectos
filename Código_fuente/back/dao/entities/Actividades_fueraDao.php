<?php


include_once realpath('../dao/interfaz/IActividades_fueraDao.php');
include_once realpath('../dto/Actividades_fuera.php');
include_once realpath('../dto/Proyectos.php');

class Actividades_fueraDao implements IActividades_fueraDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Actividades_fuera en la base de datos.
     * @param actividades_fuera objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($actividades_fuera){
      $id=$actividades_fuera->getId();
$descripcion=$actividades_fuera->getDescripcion();
$proyectos_id=$actividades_fuera->getProyectos_id()->getId();

      try {
          $sql= "INSERT INTO `actividades_fuera`( `id`, `descripcion`, `proyectos_id`)"
          ."VALUES ('$id','$descripcion','$proyectos_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Actividades_fuera en la base de datos.
     * @param actividades_fuera objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($actividades_fuera){
      $id=$actividades_fuera->getId();

      try {
          $sql= "SELECT `id`, `descripcion`, `proyectos_id`"
          ."FROM `actividades_fuera`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $actividades_fuera->setId($data[$i]['id']);
          $actividades_fuera->setDescripcion($data[$i]['descripcion']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $actividades_fuera->setProyectos_id($proyectos);

          }
      return $actividades_fuera;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Actividades_fuera en la base de datos.
     * @param actividades_fuera objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($actividades_fuera){
      $id=$actividades_fuera->getId();
$descripcion=$actividades_fuera->getDescripcion();
$proyectos_id=$actividades_fuera->getProyectos_id()->getId();

      try {
          $sql= "UPDATE `actividades_fuera` SET`id`='$id' ,`descripcion`='$descripcion' ,`proyectos_id`='$proyectos_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Actividades_fuera en la base de datos.
     * @param actividades_fuera objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($actividades_fuera){
      $id=$actividades_fuera->getId();

      try {
          $sql ="DELETE FROM `actividades_fuera` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Actividades_fuera en la base de datos.
     * @return ArrayList<Actividades_fuera> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`, `proyectos_id`"
          ."FROM `actividades_fuera`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $actividades_fuera= new Actividades_fuera();
          $actividades_fuera->setId($data[$i]['id']);
          $actividades_fuera->setDescripcion($data[$i]['descripcion']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $actividades_fuera->setProyectos_id($proyectos);

          array_push($lista,$actividades_fuera);
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