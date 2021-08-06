<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\


class Cumplimiento_objetivos {

  private $id;
  private $objetivos_propuestos;
  private $actividades_propuestas;
  private $actividades_desarrolladas;
  private $logros_alcanzados;
  private $porcentaje_cumplimiento;
  private $cumplimiento_objetivoscol;
  private $id_informe_gestion_financiado;

    /**
     * Constructor de Cumplimiento_objetivos
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
     * Devuelve el valor correspondiente a objetivos_propuestos
     * @return objetivos_propuestos
     */
  public function getObjetivos_propuestos(){
      return $this->objetivos_propuestos;
  }

    /**
     * Modifica el valor correspondiente a objetivos_propuestos
     * @param objetivos_propuestos
     */
  public function setObjetivos_propuestos($objetivos_propuestos){
      $this->objetivos_propuestos = $objetivos_propuestos;
  }
    /**
     * Devuelve el valor correspondiente a actividades_propuestas
     * @return actividades_propuestas
     */
  public function getActividades_propuestas(){
      return $this->actividades_propuestas;
  }

    /**
     * Modifica el valor correspondiente a actividades_propuestas
     * @param actividades_propuestas
     */
  public function setActividades_propuestas($actividades_propuestas){
      $this->actividades_propuestas = $actividades_propuestas;
  }
    /**
     * Devuelve el valor correspondiente a actividades_desarrolladas
     * @return actividades_desarrolladas
     */
  public function getActividades_desarrolladas(){
      return $this->actividades_desarrolladas;
  }

    /**
     * Modifica el valor correspondiente a actividades_desarrolladas
     * @param actividades_desarrolladas
     */
  public function setActividades_desarrolladas($actividades_desarrolladas){
      $this->actividades_desarrolladas = $actividades_desarrolladas;
  }
    /**
     * Devuelve el valor correspondiente a logros_alcanzados
     * @return logros_alcanzados
     */
  public function getLogros_alcanzados(){
      return $this->logros_alcanzados;
  }

    /**
     * Modifica el valor correspondiente a logros_alcanzados
     * @param logros_alcanzados
     */
  public function setLogros_alcanzados($logros_alcanzados){
      $this->logros_alcanzados = $logros_alcanzados;
  }
    /**
     * Devuelve el valor correspondiente a porcentaje_cumplimiento
     * @return porcentaje_cumplimiento
     */
  public function getPorcentaje_cumplimiento(){
      return $this->porcentaje_cumplimiento;
  }

    /**
     * Modifica el valor correspondiente a porcentaje_cumplimiento
     * @param porcentaje_cumplimiento
     */
  public function setPorcentaje_cumplimiento($porcentaje_cumplimiento){
      $this->porcentaje_cumplimiento = $porcentaje_cumplimiento;
  }
    /**
     * Devuelve el valor correspondiente a cumplimiento_objetivoscol
     * @return cumplimiento_objetivoscol
     */
  public function getCumplimiento_objetivoscol(){
      return $this->cumplimiento_objetivoscol;
  }

    /**
     * Modifica el valor correspondiente a cumplimiento_objetivoscol
     * @param cumplimiento_objetivoscol
     */
  public function setCumplimiento_objetivoscol($cumplimiento_objetivoscol){
      $this->cumplimiento_objetivoscol = $cumplimiento_objetivoscol;
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