<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella existió sólo en un sueño. Él es un poema que el poeta nunca escribió.  \\

include_once realpath('../dao/interfaz/ISemilleroDao.php');
include_once realpath('../dto/Semillero.php');
include_once realpath('../dto/Grupo_investigacion.php');

class SemilleroDao implements ISemilleroDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Semillero en la base de datos.
     * @param semillero objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($semillero){
      $id=$semillero->getId();
$nombre=$semillero->getNombre();
$sigla=$semillero->getSigla();
$fecha_creacion=$semillero->getFecha_creacion();
$aval_dic_grupo=$semillero->getAval_dic_grupo();
$aval_dic_sem=$semillero->getAval_dic_sem();
$aval_dic_unidad=$semillero->getAval_dic_unidad();
$grupo_investigacion_id=$semillero->getGrupo_investigacion_id()->getId();
$unidad_academica=$semillero->getUnidad_academica();

      try {
          $sql= "INSERT INTO `semillero`( `id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `unidad_academica`)"
          ."VALUES ('$id','$nombre','$sigla','$fecha_creacion','$aval_dic_grupo','$aval_dic_sem','$aval_dic_unidad','$grupo_investigacion_id','$unidad_academica')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Semillero en la base de datos.
     * @param semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($semillero){
      $id=$semillero->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `unidad_academica`"
          ."FROM `semillero`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $semillero->setId($data[$i]['id']);
          $semillero->setNombre($data[$i]['nombre']);
          $semillero->setSigla($data[$i]['sigla']);
          $semillero->setFecha_creacion($data[$i]['fecha_creacion']);
          $semillero->setAval_dic_grupo($data[$i]['aval_dic_grupo']);
          $semillero->setAval_dic_sem($data[$i]['aval_dic_sem']);
          $semillero->setAval_dic_unidad($data[$i]['aval_dic_unidad']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $semillero->setGrupo_investigacion_id($grupo_investigacion);
          $semillero->setUnidad_academica($data[$i]['unidad_academica']);

          }
      return $semillero;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Semillero en la base de datos.
     * @param semillero objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($semillero){
      $id=$semillero->getId();
$nombre=$semillero->getNombre();
$sigla=$semillero->getSigla();
$fecha_creacion=$semillero->getFecha_creacion();
$aval_dic_grupo=$semillero->getAval_dic_grupo();
$aval_dic_sem=$semillero->getAval_dic_sem();
$aval_dic_unidad=$semillero->getAval_dic_unidad();
$grupo_investigacion_id=$semillero->getGrupo_investigacion_id()->getId();
$unidad_academica=$semillero->getUnidad_academica();

      try {
          $sql= "UPDATE `semillero` SET`id`='$id' ,`nombre`='$nombre' ,`sigla`='$sigla' ,`fecha_creacion`='$fecha_creacion' ,`aval_dic_grupo`='$aval_dic_grupo' ,`aval_dic_sem`='$aval_dic_sem' ,`aval_dic_unidad`='$aval_dic_unidad' ,`grupo_investigacion_id`='$grupo_investigacion_id' ,`unidad_academica`='$unidad_academica' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Semillero en la base de datos.
     * @param semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($semillero){
      $id=$semillero->getId();

      try {
          $sql ="DELETE FROM `semillero` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Semillero en la base de datos.
     * @return ArrayList<Semillero> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `unidad_academica`"
          ."FROM `semillero`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $semillero= new Semillero();
          $semillero->setId($data[$i]['id']);
          $semillero->setNombre($data[$i]['nombre']);
          $semillero->setSigla($data[$i]['sigla']);
          $semillero->setFecha_creacion($data[$i]['fecha_creacion']);
          $semillero->setAval_dic_grupo($data[$i]['aval_dic_grupo']);
          $semillero->setAval_dic_sem($data[$i]['aval_dic_sem']);
          $semillero->setAval_dic_unidad($data[$i]['aval_dic_unidad']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $semillero->setGrupo_investigacion_id($grupo_investigacion);
          $semillero->setUnidad_academica($data[$i]['unidad_academica']);

          array_push($lista,$semillero);
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