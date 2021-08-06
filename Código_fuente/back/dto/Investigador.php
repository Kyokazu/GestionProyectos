<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Quédate con quien te quiera por tu back-end, no por tu front-end  \\


class Investigador {

    private $id;
    private $nombre_investigador;
    private $horas_semana;
    private $tipo_investigador;
    private $id_solicitud_horas_financiado;
    private $id_informe_gestion_financiado;

    /**
     * Constructor de Investigador
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

    function getNombre_investigador() {
        return $this->nombre_investigador;
    }

    function setNombre_investigador($nombre_investigador) {
        $this->nombre_investigador = $nombre_investigador;
    }

    /**
     * Devuelve el valor correspondiente a tipo_investigador
     * @return tipo_investigador
     */
    public function getTipo_investigador() {
        return $this->tipo_investigador;
    }

    /**
     * Modifica el valor correspondiente a tipo_investigador
     * @param tipo_investigador
     */
    public function setTipo_investigador($tipo_investigador) {
        $this->tipo_investigador = $tipo_investigador;
    }

    /**
     * Devuelve el valor correspondiente a horas_semana
     * @return horas_semana
     */
    public function getHoras_semana() {
        return $this->horas_semana;
    }

    /**
     * Modifica el valor correspondiente a horas_semana
     * @param horas_semana
     */
    public function setHoras_semana($horas_semana) {
        $this->horas_semana = $horas_semana;
    }

    /**
     * Devuelve el valor correspondiente a id_solicitud_horas_financiado
     * @return id_solicitud_horas_financiado
     */
    public function getId_solicitud_horas_financiado() {
        return $this->id_solicitud_horas_financiado;
    }

    /**
     * Modifica el valor correspondiente a id_solicitud_horas_financiado
     * @param id_solicitud_horas_financiado
     */
    public function setId_solicitud_horas_financiado($id_solicitud_horas_financiado) {
        $this->id_solicitud_horas_financiado = $id_solicitud_horas_financiado;
    }

    /**
     * Devuelve el valor correspondiente a id_informe_gestion_financiado
     * @return id_informe_gestion_financiado
     */
    public function getId_informe_gestion_financiado() {
        return $this->id_informe_gestion_financiado;
    }

    /**
     * Modifica el valor correspondiente a id_informe_gestion_financiado
     * @param id_informe_gestion_financiado
     */
    public function setId_informe_gestion_financiado($id_informe_gestion_financiado) {
        $this->id_informe_gestion_financiado = $id_informe_gestion_financiado;
    }

}

//That`s all folks!