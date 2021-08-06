<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\

include_once realpath('../dao/interfaz/IInforme_gestion_semilleroDao.php');
include_once realpath('../dto/Informe_gestion_semillero.php');
include_once realpath('../dto/Capacitaciones.php');
include_once realpath('../dto/Proyectos.php');

class Informe_gestion_semilleroDao implements IInforme_gestion_semilleroDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Informe_gestion_semillero en la base de datos.
     * @param informe_gestion_semillero objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($informe_gestion_semillero){
      $id=$informe_gestion_semillero->getId();
$fecha=$informe_gestion_semillero->getFecha();
$semestre=$informe_gestion_semillero->getSemestre();
$capacitaciones_id=$informe_gestion_semillero->getCapacitaciones_id()->getId();
$proyectos_id=$informe_gestion_semillero->getProyectos_id()->getId();

      try {
          $sql= "INSERT INTO `informe_gestion_semillero`( `id`, `fecha`, `semestre`, `capacitaciones_id`, `proyectos_id`)"
          ."VALUES ('$id','$fecha','$semestre','$capacitaciones_id','$proyectos_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Informe_gestion_semillero en la base de datos.
     * @param informe_gestion_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($informe_gestion_semillero){
      $id=$informe_gestion_semillero->getId();

      try {
          $sql= "SELECT `id`, `fecha`, `semestre`, `capacitaciones_id`, `proyectos_id`"
          ."FROM `informe_gestion_semillero`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $informe_gestion_semillero->setId($data[$i]['id']);
          $informe_gestion_semillero->setFecha($data[$i]['fecha']);
          $informe_gestion_semillero->setSemestre($data[$i]['semestre']);
           $capacitaciones = new Capacitaciones();
           $capacitaciones->setId($data[$i]['capacitaciones_id']);
           $informe_gestion_semillero->setCapacitaciones_id($capacitaciones);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $informe_gestion_semillero->setProyectos_id($proyectos);

          }
      return $informe_gestion_semillero;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Informe_gestion_semillero en la base de datos.
     * @param informe_gestion_semillero objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($informe_gestion_semillero){
      $id=$informe_gestion_semillero->getId();
$fecha=$informe_gestion_semillero->getFecha();
$semestre=$informe_gestion_semillero->getSemestre();
$capacitaciones_id=$informe_gestion_semillero->getCapacitaciones_id()->getId();
$proyectos_id=$informe_gestion_semillero->getProyectos_id()->getId();

      try {
          $sql= "UPDATE `informe_gestion_semillero` SET`id`='$id' ,`fecha`='$fecha' ,`semestre`='$semestre' ,`capacitaciones_id`='$capacitaciones_id' ,`proyectos_id`='$proyectos_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Informe_gestion_semillero en la base de datos.
     * @param informe_gestion_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($informe_gestion_semillero){
      $id=$informe_gestion_semillero->getId();

      try {
          $sql ="DELETE FROM `informe_gestion_semillero` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Informe_gestion_semillero en la base de datos.
     * @return ArrayList<Informe_gestion_semillero> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `fecha`, `semestre`, `capacitaciones_id`, `proyectos_id`"
          ."FROM `informe_gestion_semillero`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $informe_gestion_semillero= new Informe_gestion_semillero();
          $informe_gestion_semillero->setId($data[$i]['id']);
          $informe_gestion_semillero->setFecha($data[$i]['fecha']);
          $informe_gestion_semillero->setSemestre($data[$i]['semestre']);
           $capacitaciones = new Capacitaciones();
           $capacitaciones->setId($data[$i]['capacitaciones_id']);
           $informe_gestion_semillero->setCapacitaciones_id($capacitaciones);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $informe_gestion_semillero->setProyectos_id($proyectos);

          array_push($lista,$informe_gestion_semillero);
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