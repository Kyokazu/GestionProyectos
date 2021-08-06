<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Podrías agradecernos con unos cuantos billetes _/(n.n)\_  \\


class Actividades_jovenes {

  private $id;
  private $actividades_desarrolladas;
  private $productos_alcanzados;
  private $semestre;
  private $id_informe_gestion_jovenes;

    /**
     * Constructor de Actividades_jovenes
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
     * Devuelve el valor correspondiente a productos_alcanzados
     * @return productos_alcanzados
     */
  public function getProductos_alcanzados(){
      return $this->productos_alcanzados;
  }

    /**
     * Modifica el valor correspondiente a productos_alcanzados
     * @param productos_alcanzados
     */
  public function setProductos_alcanzados($productos_alcanzados){
      $this->productos_alcanzados = $productos_alcanzados;
  }
    /**
     * Devuelve el valor correspondiente a semestre
     * @return semestre
     */
  public function getSemestre(){
      return $this->semestre;
  }

    /**
     * Modifica el valor correspondiente a semestre
     * @param semestre
     */
  public function setSemestre($semestre){
      $this->semestre = $semestre;
  }
    /**
     * Devuelve el valor correspondiente a id_informe_gestion_jovenes
     * @return id_informe_gestion_jovenes
     */
  public function getId_informe_gestion_jovenes(){
      return $this->id_informe_gestion_jovenes;
  }

    /**
     * Modifica el valor correspondiente a id_informe_gestion_jovenes
     * @param id_informe_gestion_jovenes
     */
  public function setId_informe_gestion_jovenes($id_informe_gestion_jovenes){
      $this->id_informe_gestion_jovenes = $id_informe_gestion_jovenes;
  }


}
//That`s all folks!