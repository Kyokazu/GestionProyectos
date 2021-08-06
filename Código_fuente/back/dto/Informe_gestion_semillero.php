<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La última regla es confiar en Arciniegas  \\


class Informe_gestion_semillero {

  private $id;
  private $fecha;
  private $semestre;
  private $capacitaciones_id;
  private $proyectos_id;

    /**
     * Constructor de Informe_gestion_semillero
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
     * Devuelve el valor correspondiente a semestre
     * @return semestre
     */
  public function getSemestre(){
      return $this->semestre;
  }

    /**
     * Modifica el valor correspondiente a semestre
     * @param semestre
     */
  public function setSemestre($semestre){
      $this->semestre = $semestre;
  }
    /**
     * Devuelve el valor correspondiente a capacitaciones_id
     * @return capacitaciones_id
     */
  public function getCapacitaciones_id(){
      return $this->capacitaciones_id;
  }

    /**
     * Modifica el valor correspondiente a capacitaciones_id
     * @param capacitaciones_id
     */
  public function setCapacitaciones_id($capacitaciones_id){
      $this->capacitaciones_id = $capacitaciones_id;
  }
    /**
     * Devuelve el valor correspondiente a proyectos_id
     * @return proyectos_id
     */
  public function getProyectos_id(){
      return $this->proyectos_id;
  }

    /**
     * Modifica el valor correspondiente a proyectos_id
     * @param proyectos_id
     */
  public function setProyectos_id($proyectos_id){
      $this->proyectos_id = $proyectos_id;
  }


}
//That`s all folks!