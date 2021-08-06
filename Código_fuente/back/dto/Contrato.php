<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora tú puedes ser el tipo con el látigo  \\


class Contrato {

  private $id;
  private $numero_contrato;
  private $acta_comite;
  private $valor_financiado;
  private $fecha_inicio;
  private $fecha_suspension;
  private $fecha_reinicio;
  private $prorroga;
  private $fecha_terminacion;
  private $tiempo_ejecucion;
  private $id_informe_gestion_financiado;

    /**
     * Constructor de Contrato
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
     * Devuelve el valor correspondiente a numero_contrato
     * @return numero_contrato
     */
  public function getNumero_contrato(){
      return $this->numero_contrato;
  }

    /**
     * Modifica el valor correspondiente a numero_contrato
     * @param numero_contrato
     */
  public function setNumero_contrato($numero_contrato){
      $this->numero_contrato = $numero_contrato;
  }
    /**
     * Devuelve el valor correspondiente a acta_comite
     * @return acta_comite
     */
  public function getActa_comite(){
      return $this->acta_comite;
  }

    /**
     * Modifica el valor correspondiente a acta_comite
     * @param acta_comite
     */
  public function setActa_comite($acta_comite){
      $this->acta_comite = $acta_comite;
  }
    /**
     * Devuelve el valor correspondiente a valor_financiado
     * @return valor_financiado
     */
  public function getValor_financiado(){
      return $this->valor_financiado;
  }

    /**
     * Modifica el valor correspondiente a valor_financiado
     * @param valor_financiado
     */
  public function setValor_financiado($valor_financiado){
      $this->valor_financiado = $valor_financiado;
  }
    /**
     * Devuelve el valor correspondiente a fecha_inicio
     * @return fecha_inicio
     */
  public function getFecha_inicio(){
      return $this->fecha_inicio;
  }

    /**
     * Modifica el valor correspondiente a fecha_inicio
     * @param fecha_inicio
     */
  public function setFecha_inicio($fecha_inicio){
      $this->fecha_inicio = $fecha_inicio;
  }
    /**
     * Devuelve el valor correspondiente a fecha_suspension
     * @return fecha_suspension
     */
  public function getFecha_suspension(){
      return $this->fecha_suspension;
  }

    /**
     * Modifica el valor correspondiente a fecha_suspension
     * @param fecha_suspension
     */
  public function setFecha_suspension($fecha_suspension){
      $this->fecha_suspension = $fecha_suspension;
  }
    /**
     * Devuelve el valor correspondiente a fecha_reinicio
     * @return fecha_reinicio
     */
  public function getFecha_reinicio(){
      return $this->fecha_reinicio;
  }

    /**
     * Modifica el valor correspondiente a fecha_reinicio
     * @param fecha_reinicio
     */
  public function setFecha_reinicio($fecha_reinicio){
      $this->fecha_reinicio = $fecha_reinicio;
  }
    /**
     * Devuelve el valor correspondiente a prorroga
     * @return prorroga
     */
  public function getProrroga(){
      return $this->prorroga;
  }

    /**
     * Modifica el valor correspondiente a prorroga
     * @param prorroga
     */
  public function setProrroga($prorroga){
      $this->prorroga = $prorroga;
  }
    /**
     * Devuelve el valor correspondiente a fecha_terminacion
     * @return fecha_terminacion
     */
  public function getFecha_terminacion(){
      return $this->fecha_terminacion;
  }

    /**
     * Modifica el valor correspondiente a fecha_terminacion
     * @param fecha_terminacion
     */
  public function setFecha_terminacion($fecha_terminacion){
      $this->fecha_terminacion = $fecha_terminacion;
  }
    /**
     * Devuelve el valor correspondiente a tiempo_ejecucion
     * @return tiempo_ejecucion
     */
  public function getTiempo_ejecucion(){
      return $this->tiempo_ejecucion;
  }

    /**
     * Modifica el valor correspondiente a tiempo_ejecucion
     * @param tiempo_ejecucion
     */
  public function setTiempo_ejecucion($tiempo_ejecucion){
      $this->tiempo_ejecucion = $tiempo_ejecucion;
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