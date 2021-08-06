<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    ¡Muerte a todos los humanos!  \\


class Concepto_cumplimiento {

    private $id;
    private $id_proyecto;
    private $nombre_investigador;
    private $nombre_proyecto;
    private $condicion_investigador;
    private $vb_director_departamento;
    private $vb_representante_facultad;
    private $fecha_solicitud;

    /**
     * Constructor de Concepto_cumplimiento
     */
    public function __construct() {
        
    }

    /**
     * Devuelve el valor correspondiente a id
     * @return id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Modifica el valor correspondiente a id
     * @param id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Devuelve el valor correspondiente a id_proyecto
     * @return id_proyecto
     */
    public function getId_proyecto() {
        return $this->id_proyecto;
    }

    /**
     * Modifica el valor correspondiente a id_proyecto
     * @param id_proyecto
     */
    public function setId_proyecto($id_proyecto) {
        $this->id_proyecto = $id_proyecto;
    }

    /**
     * Devuelve el valor correspondiente a nombre_investigador
     * @return nombre_investigador
     */
    public function getNombre_investigador() {
        return $this->nombre_investigador;
    }

    /**
     * Modifica el valor correspondiente a nombre_investigador
     * @param nombre_investigador
     */
    public function setNombre_investigador($nombre_investigador) {
        $this->nombre_investigador = $nombre_investigador;
    }

    /**
     * Devuelve el valor correspondiente a nombre_proyecto
     * @return nombre_proyecto
     */
    public function getNombre_proyecto() {
        return $this->nombre_proyecto;
    }

    /**
     * Modifica el valor correspondiente a nombre_proyecto
     * @param nombre_proyecto
     */
    public function setNombre_proyecto($nombre_proyecto) {
        $this->nombre_proyecto = $nombre_proyecto;
    }

    /**
     * Devuelve el valor correspondiente a condicion_investigador
     * @return condicion_investigador
     */
    public function getCondicion_investigador() {
        return $this->condicion_investigador;
    }

    /**
     * Modifica el valor correspondiente a condicion_investigador
     * @param condicion_investigador
     */
    public function setCondicion_investigador($condicion_investigador) {
        $this->condicion_investigador = $condicion_investigador;
    }

    function getFecha_solicitud() {
        return $this->fecha_solicitud;
    }

    function setFecha_solicitud($fecha_solicitud) {
        $this->fecha_solicitud = $fecha_solicitud;
    }

    function getVb_director_departamento() {
        return $this->vb_director_departamento;
    }

    function getVb_representante_facultad() {
        return $this->vb_representante_facultad;
    }

    function setVb_director_departamento($vb_director_departamento) {
        $this->vb_director_departamento = $vb_director_departamento;
    }

    function setVb_representante_facultad($vb_representante_facultad) {
        $this->vb_representante_facultad = $vb_representante_facultad;
    }

}

//That`s all folks!