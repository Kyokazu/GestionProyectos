<?php


class Cumplimiento_acompanamiento {

  private $id;
  private $nombre_joven;
  private $nombre_tutor;
  private $estado_solicitud;
  private $fecha_solicitud;

    /**
     * Constructor de Cumplimiento_acompanamiento
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
     * Devuelve el valor correspondiente a nombre_joven
     * @return nombre_joven
     */
  public function getNombre_joven(){
      return $this->nombre_joven;
  }

    /**
     * Modifica el valor correspondiente a nombre_joven
     * @param nombre_joven
     */
  public function setNombre_joven($nombre_joven){
      $this->nombre_joven = $nombre_joven;
  }
    /**
     * Devuelve el valor correspondiente a nombre_tutor
     * @return nombre_tutor
     */
  public function getNombre_tutor(){
      return $this->nombre_tutor;
  }

    /**
     * Modifica el valor correspondiente a nombre_tutor
     * @param nombre_tutor
     */
  public function setNombre_tutor($nombre_tutor){
      $this->nombre_tutor = $nombre_tutor;
  }
  function getEstado_solicitud() {
      return $this->estado_solicitud;
  }

  function setEstado_solicitud($estado_solicitud) {
      $this->estado_solicitud = $estado_solicitud;
  }

  function getFecha_solicitud() {
      return $this->fecha_solicitud;
  }

  function setFecha_solicitud($fecha_solicitud) {
      $this->fecha_solicitud = $fecha_solicitud;
  }




}
//That`s all folks!