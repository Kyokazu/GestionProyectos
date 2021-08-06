<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Oh gloria de las glorias, oh divino testamento de la eterna majestad de la creación de dios  \\


class Datos_fuera_registro {

  private $id;
  private $producto;
  private $descripcion;
  private $responsable;
  private $fecha;
  private $informe_gestion_semillero_id;

    /**
     * Constructor de Datos_fuera_registro
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a id
     * @return id
     */
  public function getId(){
      return $this->id;
  }

    /**
     * Modifica el valor correspondiente a id
     * @param id
     */
  public function setId($id){
      $this->id = $id;
  }
    /**
     * Devuelve el valor correspondiente a producto
     * @return producto
     */
  public function getProducto(){
      return $this->producto;
  }

    /**
     * Modifica el valor correspondiente a producto
     * @param producto
     */
  public function setProducto($producto){
      $this->producto = $producto;
  }
    /**
     * Devuelve el valor correspondiente a descripcion
     * @return descripcion
     */
  public function getDescripcion(){
      return $this->descripcion;
  }

    /**
     * Modifica el valor correspondiente a descripcion
     * @param descripcion
     */
  public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
  }
    /**
     * Devuelve el valor correspondiente a responsable
     * @return responsable
     */
  public function getResponsable(){
      return $this->responsable;
  }

    /**
     * Modifica el valor correspondiente a responsable
     * @param responsable
     */
  public function setResponsable($responsable){
      $this->responsable = $responsable;
  }
    /**
     * Devuelve el valor correspondiente a fecha
     * @return fecha
     */
  public function getFecha(){
      return $this->fecha;
  }

    /**
     * Modifica el valor correspondiente a fecha
     * @param fecha
     */
  public function setFecha($fecha){
      $this->fecha = $fecha;
  }
    /**
     * Devuelve el valor correspondiente a informe_gestion_semillero_id
     * @return informe_gestion_semillero_id
     */
  public function getInforme_gestion_semillero_id(){
      return $this->informe_gestion_semillero_id;
  }

    /**
     * Modifica el valor correspondiente a informe_gestion_semillero_id
     * @param informe_gestion_semillero_id
     */
  public function setInforme_gestion_semillero_id($informe_gestion_semillero_id){
      $this->informe_gestion_semillero_id = $informe_gestion_semillero_id;
  }


}
//That`s all folks!