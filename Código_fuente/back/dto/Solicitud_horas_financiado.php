<?php

class Solicitud_horas_financiado {

    private $id;
    private $nombre_proyecto;
    private $id_proyecto;
    private $id_contrato;
    private $vb_director_grupo;
    private $vb_representante_facultad;
    private $fecha_solicitud;
    private $fecha_ultimo_informe;

    /**
     * Constructor de Solicitud_horas_financiado
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
     * Devuelve el valor correspondiente a id_contrato
     * @return id_contrato
     */
    public function getId_contrato() {
        return $this->id_contrato;
    }

    /**
     * Modifica el valor correspondiente a id_contrato
     * @param id_contrato
     */
    public function setId_contrato($id_contrato) {
        $this->id_contrato = $id_contrato;
    }

    function getFecha_solicitud() {
        return $this->fecha_solicitud;
    }

    function setFecha_solicitud($fecha_solicitud) {
        $this->fecha_solicitud = $fecha_solicitud;
    }

    function getNombre_proyecto() {
        return $this->nombre_proyecto;
    }

    function setNombre_proyecto($nombre_proyecto) {
        $this->nombre_proyecto = $nombre_proyecto;
    }

    function getFecha_ultimo_informe() {
        return $this->fecha_ultimo_informe;
    }

    function setFecha_ultimo_informe($fecha_ultimo_informe) {
        $this->fecha_ultimo_informe = $fecha_ultimo_informe;
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