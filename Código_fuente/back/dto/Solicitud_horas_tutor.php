<?php

class Solicitud_horas_tutor {

    private $id;
    private $nombre_docente;
    private $nombre_convenio;
    private $grupo_investigacion;
    private $nombre_propuesta;
    private $numero_acta;
    private $fecha_inicio_joven;
    private $tipo_tutor;
    private $semestre;
    private $horas_solicitadas;
    private $fecha_solicitud;
    private $vb_director_grupo;
    private $vb_representante_facultad;

    /**
     * Constructor de Solicitud_horas_tutor
     */
    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    function getFecha_solicitud() {
        return $this->fecha_solicitud;
    }

    function setFecha_solicitud($fecha_solicitud) {
        $this->fecha_solicitud = $fecha_solicitud;
    }

    function getNumero_acta() {
        return $this->numero_acta;
    }

    function setNumero_acta($numero_acta) {
        $this->numero_acta = $numero_acta;
    }

    function getTipo_tutor() {
        return $this->tipo_tutor;
    }

    function getSemestre() {
        return $this->semestre;
    }

    function setTipo_tutor($tipo_tutor) {
        $this->tipo_tutor = $tipo_tutor;
    }

    function setSemestre($semestre) {
        $this->semestre = $semestre;
    }

    /**
     * Modifica el valor correspondiente a id
     * @param id
     */
    public function setId($id) {
        $this->id = $id;
    }

    function getNombre_docente() {
        return $this->nombre_docente;
    }

    function setNombre_docente($nombre_docente) {
        $this->nombre_docente = $nombre_docente;
    }

    /**
     * Devuelve el valor correspondiente a nombre_convenio
     * @return nombre_convenio
     */
    public function getNombre_convenio() {
        return $this->nombre_convenio;
    }

    /**
     * Modifica el valor correspondiente a nombre_convenio
     * @param nombre_convenio
     */
    public function setNombre_convenio($nombre_convenio) {
        $this->nombre_convenio = $nombre_convenio;
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
     * Devuelve el valor correspondiente a nombre_propuesta
     * @return nombre_propuesta
     */
    public function getNombre_propuesta() {
        return $this->nombre_propuesta;
    }

    /**
     * Modifica el valor correspondiente a nombre_propuesta
     * @param nombre_propuesta
     */
    public function setNombre_propuesta($nombre_propuesta) {
        $this->nombre_propuesta = $nombre_propuesta;
    }

    /**
     * Devuelve el valor correspondiente a contrato_id
     * @return contrato_id
     */
    public function getContrato_id() {
        return $this->contrato_id;
    }

    /**
     * Modifica el valor correspondiente a contrato_id
     * @param contrato_id
     */
    public function setContrato_id($contrato_id) {
        $this->contrato_id = $contrato_id;
    }

    /**
     * Devuelve el valor correspondiente a fecha_inicio_joven
     * @return fecha_inicio_joven
     */
    public function getFecha_inicio_joven() {
        return $this->fecha_inicio_joven;
    }

    /**
     * Modifica el valor correspondiente a fecha_inicio_joven
     * @param fecha_inicio_joven
     */
    public function setFecha_inicio_joven($fecha_inicio_joven) {
        $this->fecha_inicio_joven = $fecha_inicio_joven;
    }

    /**
     * Devuelve el valor correspondiente a horas_solicitadas
     * @return horas_solicitadas
     */
    public function getHoras_solicitadas() {
        return $this->horas_solicitadas;
    }

    /**
     * Modifica el valor correspondiente a horas_solicitadas
     * @param horas_solicitadas
     */
    public function setHoras_solicitadas($horas_solicitadas) {
        $this->horas_solicitadas = $horas_solicitadas;
    }

    function getVb_director_grupo() {
        return $this->vb_director_grupo;
    }

    function getVb_representante_facultad() {
        return $this->vb_representante_facultad;
    }

    function setVb_director_grupo($vb_director_grupo) {
        $this->vb_director_grupo = $vb_director_grupo;
    }

    function setVb_representante_facultad($vb_representante_facultad) {
        $this->vb_representante_facultad = $vb_representante_facultad;
    }



}

//That`s all folks!