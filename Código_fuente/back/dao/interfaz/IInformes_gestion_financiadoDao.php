<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\


interface IInformes_gestion_financiadoDao {

    /**
     * Guarda un objeto Informes_gestion_financiado en la base de datos.
     * @param informes_gestion_financiado objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($informes_gestion_financiado);
    /**
     * Modifica un objeto Informes_gestion_financiado en la base de datos.
     * @param informes_gestion_financiado objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($informes_gestion_financiado);
    /**
     * Elimina un objeto Informes_gestion_financiado en la base de datos.
     * @param informes_gestion_financiado objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($informes_gestion_financiado);
    /**
     * Busca un objeto Informes_gestion_financiado en la base de datos.
     * @param informes_gestion_financiado objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($informes_gestion_financiado);
    /**
     * Lista todos los objetos Informes_gestion_financiado en la base de datos.
     * @return Array<Informes_gestion_financiado> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!