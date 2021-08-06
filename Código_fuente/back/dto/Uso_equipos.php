<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ojos de perro azul  \\


class Uso_equipos {

  private $id;
  private $equipo;
  private $proyecto;
  private $otro_proyecto;
  private $uso_posterior;
  private $id_informe_gestion_financiado;

    /**
     * Constructor de Uso_equipos
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
     * Devuelve el valor correspondiente a equipo
     * @return equipo
     */
  public function getEquipo(){
      return $this->equipo;
  }

    /**
     * Modifica el valor correspondiente a equipo
     * @param equipo
     */
  public function setEquipo($equipo){
      $this->equipo = $equipo;
  }
    /**
     * Devuelve el valor correspondiente a proyecto
     * @return proyecto
     */
  public function getProyecto(){
      return $this->proyecto;
  }

    /**
     * Modifica el valor correspondiente a proyecto
     * @param proyecto
     */
  public function setProyecto($proyecto){
      $this->proyecto = $proyecto;
  }
    /**
     * Devuelve el valor correspondiente a otro_proyecto
     * @return otro_proyecto
     */
  public function getOtro_proyecto(){
      return $this->otro_proyecto;
  }

    /**
     * Modifica el valor correspondiente a otro_proyecto
     * @param otro_proyecto
     */
  public function setOtro_proyecto($otro_proyecto){
      $this->otro_proyecto = $otro_proyecto;
  }
    /**
     * Devuelve el valor correspondiente a uso_posterior
     * @return uso_posterior
     */
  public function getUso_posterior(){
      return $this->uso_posterior;
  }

    /**
     * Modifica el valor correspondiente a uso_posterior
     * @param uso_posterior
     */
  public function setUso_posterior($uso_posterior){
      $this->uso_posterior = $uso_posterior;
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