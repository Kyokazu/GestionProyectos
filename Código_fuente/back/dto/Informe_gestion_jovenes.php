<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    404 Frase no encontrada  \\


class Informe_gestion_jovenes {

    private $id;
    private $facultad;
    private $grupo_investigacion;
    private $departamento;
    private $nombre_tutor;
    private $linea_investigacion;
    private $nombre_joven;
    private $convenio_colciencias;
    private $numero_convocatoria;
    private $periodo_tutoria;
    private $vb_director_grupo;
    private $vb_director_departamento;
    private $vb_representante_facultad;
    private $fecha_solicitud;

    /**
     * Constructor de Informe_gestion_jovenes
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
     * Devuelve el valor correspondiente a facultad
     * @return facultad
     */
    public function getFacultad() {
        return $this->facultad;
    }

    /**
     * Modifica el valor correspondiente a facultad
     * @param facultad
     */
    public function setFacultad($facultad) {
        $this->facultad = $facultad;
    }

    /**
     * Devuelve el valor correspondiente a grupo_investigacion
     * @return grupo_investigacion
     */
    public function getGrupo_investigacion() {
        return $this->grupo_investigacion;
    }

    /**
     * Modifica el valor correspondiente a grupo_investigacion
     * @param grupo_investigacion
     */
    public function setGrupo_investigacion($grupo_investigacion) {
        $this->grupo_investigacion = $grupo_investigacion;
    }

    /**
     * Devuelve el valor correspondiente a departamento
     * @return departamento
     */
    public function getDepartamento() {
        return $this->departamento;
    }

    /**
     * Modifica el valor correspondiente a departamento
     * @param departamento
     */
    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    /**
     * Devuelve el valor correspondiente a nombre_tutor
     * @return nombre_tutor
     */
    public function getNombre_tutor() {
        return $this->nombre_tutor;
    }

    /**
     * Modifica el valor correspondiente a nombre_tutor
     * @param nombre_tutor
     */
    public function setNombre_tutor($nombre_tutor) {
        $this->nombre_tutor = $nombre_tutor;
    }

    /**
     * Devuelve el valor correspondiente a linea_investigacion
     * @return linea_investigacion
     */
    public function getLinea_investigacion() {
        return $this->linea_investigacion;
    }

    /**
     * Modifica el valor correspondiente a linea_investigacion
     * @param linea_investigacion
     */
    public function setLinea_investigacion($linea_investigacion) {
        $this->linea_investigacion = $linea_investigacion;
    }

    /**
     * Devuelve el valor correspondiente a nombre_joven
     * @return nombre_joven
     */
    public function getNombre_joven() {
        return $this->nombre_joven;
    }

    /**
     * Modifica el valor correspondiente a nombre_joven
     * @param nombre_joven
     */
    public function setNombre_joven($nombre_joven) {
        $this->nombre_joven = $nombre_joven;
    }

    /**
     * Devuelve el valor correspondiente a convenio_colciencias
     * @return convenio_colciencias
     */
    public function getConvenio_colciencias() {
        return $this->convenio_colciencias;
    }

    /**
     * Modifica el valor correspondiente a convenio_colciencias
     * @param convenio_colciencias
     */
    public function setConvenio_colciencias($convenio_colciencias) {
        $this->convenio_colciencias = $convenio_colciencias;
    }

    /**
     * Devuelve el valor correspondiente a numero_convocatoria
     * @return numero_convocatoria
     */
    public function getNumero_convocatoria() {
        return $this->numero_convocatoria;
    }

    /**
     * Modifica el valor correspondiente a numero_convocatoria
     * @param numero_convocatoria
     */
    public function setNumero_convocatoria($numero_convocatoria) {
        $this->numero_convocatoria = $numero_convocatoria;
    }

    /**
     * Devuelve el valor correspondiente a periodo_tutoria
     * @return periodo_tutoria
     */
    public function getPeriodo_tutoria() {
        return $this->periodo_tutoria;
    }

    /**
     * Modifica el valor correspondiente a periodo_tutoria
     * @param periodo_tutoria
     */
    public function setPeriodo_tutoria($periodo_tutoria) {
        $this->periodo_tutoria = $periodo_tutoria;
    }

    function getFecha_solicitud() {
        return $this->fecha_solicitud;
    }

    function setFecha_solicitud($fecha_solicitud) {
        $this->fecha_solicitud = $fecha_solicitud;
    }

    function getVb_director_grupo() {
        return $this->vb_director_grupo;
    }

    function getVb_director_departamento() {
        return $this->vb_director_departamento;
    }

    function getVb_representante_facultad() {
        return $this->vb_representante_facultad;
    }

    function setVb_director_grupo($vb_director_grupo) {
        $this->vb_director_grupo = $vb_director_grupo;
    }

    function setVb_director_departamento($vb_director_departamento) {
        $this->vb_director_departamento = $vb_director_departamento;
    }

    function setVb_representante_facultad($vb_representante_facultad) {
        $this->vb_representante_facultad = $vb_representante_facultad;
    }

}

//That`s all folks!