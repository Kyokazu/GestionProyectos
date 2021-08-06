<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\


class Cumplimiento_cronograma {

  private $id;
  private $objetivo;
  private $actividades;
  private $estado;
  private $semestre;
  private $id_informe_gestion_financiado;

    /**
     * Constructor de Cumplimiento_cronograma
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
     * Devuelve el valor correspondiente a objetivo
     * @return objetivo
     */
  public function getObjetivo(){
      return $this->objetivo;
  }

    /**
     * Modifica el valor correspondiente a objetivo
     * @param objetivo
     */
  public function setObjetivo($objetivo){
      $this->objetivo = $objetivo;
  }
    /**
     * Devuelve el valor correspondiente a actividades
     * @return actividades
     */
  public function getActividades(){
      return $this->actividades;
  }

    /**
     * Modifica el valor correspondiente a actividades
     * @param actividades
     */
  public function setActividades($actividades){
      $this->actividades = $actividades;
  }
    /**
     * Devuelve el valor correspondiente a estado
     * @return estado
     */
  public function getEstado(){
      return $this->estado;
  }

    /**
     * Modifica el valor correspondiente a estado
     * @param estado
     */
  public function setEstado($estado){
      $this->estado = $estado;
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
     * Devuelve el valor correspondiente a id_informe_gestion_financiado
     * @return id_informe_gestion_financiado
     */
  public function getId_informe_gestion_financiado(){
      return $this->id_informe_gestion_financiado;
  }

    /**
     * Modifica el valor correspondiente a id_informe_gestion_financiado
     * @param id_informe_gestion_financiado
     */
  public function setId_informe_gestion_financiado($id_informe_gestion_financiado){
      $this->id_informe_gestion_financiado = $id_informe_gestion_financiado;
  }


}
//That`s all folks!