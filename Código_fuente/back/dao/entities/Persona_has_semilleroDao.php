<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\

include_once realpath('../dao/interfaz/IPersona_has_semilleroDao.php');
include_once realpath('../dto/Persona_has_semillero.php');
include_once realpath('../dto/Persona.php');
include_once realpath('../dto/Semillero.php');

class Persona_has_semilleroDao implements IPersona_has_semilleroDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($persona_has_semillero){
      $id=$persona_has_semillero->getId();
$persona_id=$persona_has_semillero->getPersona_id()->getId();
$semillero_id=$persona_has_semillero->getSemillero_id()->getId();

      try {
          $sql= "INSERT INTO `persona_has_semillero`( `id`, `persona_id`, `semillero_id`)"
          ."VALUES ('$id','$persona_id','$semillero_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($persona_has_semillero){
      $id=$persona_has_semillero->getId();

      try {
          $sql= "SELECT `id`, `persona_id`, `semillero_id`"
          ."FROM `persona_has_semillero`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $persona_has_semillero->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona_has_semillero->setPersona_id($persona);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $persona_has_semillero->setSemillero_id($semillero);

          }
      return $persona_has_semillero;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($persona_has_semillero){
      $id=$persona_has_semillero->getId();
$persona_id=$persona_has_semillero->getPersona_id()->getId();
$semillero_id=$persona_has_semillero->getSemillero_id()->getId();

      try {
          $sql= "UPDATE `persona_has_semillero` SET`id`='$id' ,`persona_id`='$persona_id' ,`semillero_id`='$semillero_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($persona_has_semillero){
      $id=$persona_has_semillero->getId();

      try {
          $sql ="DELETE FROM `persona_has_semillero` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona_has_semillero en la base de datos.
     * @return ArrayList<Persona_has_semillero> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `persona_id`, `semillero_id`"
          ."FROM `persona_has_semillero`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $persona_has_semillero= new Persona_has_semillero();
          $persona_has_semillero->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona_has_semillero->setPersona_id($persona);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $persona_has_semillero->setSemillero_id($semillero);

          array_push($lista,$persona_has_semillero);
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