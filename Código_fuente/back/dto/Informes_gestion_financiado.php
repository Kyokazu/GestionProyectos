<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    They call me Mr. Espagueti  \\


class Informes_gestion_financiado {

  private $id;
  private $id_proyecto;
  private $grupo_investigacion;
  private $facultad;
  private $representante_facultad;
  private $duracion_proyecto;
  private $novedades_proyecto;
  private $conclusiones;
  private $observaciones;
  private $estado_solicitud;
  private $fecha_solicitud;

    /**
     * Constructor de Informes_gestion_financiado
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
     * Devuelve el valor correspondiente a id_proyecto
     * @return id_proyecto
     */
  public function getId_proyecto(){
      return $this->id_proyecto;
  }

    /**
     * Modifica el valor correspondiente a id_proyecto
     * @param id_proyecto
     */
  public function setId_proyecto($id_proyecto){
      $this->id_proyecto = $id_proyecto;
  }
    /**
     * Devuelve el valor correspondiente a grupo_investigacion
     * @return grupo_investigacion
     */
  public function getGrupo_investigacion(){
      return $this->grupo_investigacion;
  }

    /**
     * Modifica el valor correspondiente a grupo_investigacion
     * @param grupo_investigacion
     */
  public function setGrupo_investigacion($grupo_investigacion){
      $this->grupo_investigacion = $grupo_investigacion;
  }
    /**
     * Devuelve el valor correspondiente a facultad
     * @return facultad
     */
  public function getFacultad(){
      return $this->facultad;
  }

    /**
     * Modifica el valor correspondiente a facultad
     * @param facultad
     */
  public function setFacultad($facultad){
      $this->facultad = $facultad;
  }
    /**
     * Devuelve el valor correspondiente a representante_facultad
     * @return representante_facultad
     */
  public function getRepresentante_facultad(){
      return $this->representante_facultad;
  }

    /**
     * Modifica el valor correspondiente a representante_facultad
     * @param representante_facultad
     */
  public function setRepresentante_facultad($representante_facultad){
      $this->representante_facultad = $representante_facultad;
  }
    /**
     * Devuelve el valor correspondiente a duracion_proyecto
     * @return duracion_proyecto
     */
  public function getDuracion_proyecto(){
      return $this->duracion_proyecto;
  }

    /**
     * Modifica el valor correspondiente a duracion_proyecto
     * @param duracion_proyecto
     */
  public function setDuracion_proyecto($duracion_proyecto){
      $this->duracion_proyecto = $duracion_proyecto;
  }
    /**
     * Devuelve el valor correspondiente a novedades_proyecto
     * @return novedades_proyecto
     */
  public function getNovedades_proyecto(){
      return $this->novedades_proyecto;
  }

    /**
     * Modifica el valor correspondiente a novedades_proyecto
     * @param novedades_proyecto
     */
  public function setNovedades_proyecto($novedades_proyecto){
      $this->novedades_proyecto = $novedades_proyecto;
  }
    /**
     * Devuelve el valor correspondiente a conclusiones
     * @return conclusiones
     */
  public function getConclusiones(){
      return $this->conclusiones;
  }

    /**
     * Modifica el valor correspondiente a conclusiones
     * @param conclusiones
     */
  public function setConclusiones($conclusiones){
      $this->conclusiones = $conclusiones;
  }
    /**
     * Devuelve el valor correspondiente a observaciones
     * @return observaciones
     */
  public function getObservaciones(){
      return $this->observaciones;
  }

    /**
     * Modifica el valor correspondiente a observaciones
     * @param observaciones
     */
  public function setObservaciones($observaciones){
      $this->observaciones = $observaciones;
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