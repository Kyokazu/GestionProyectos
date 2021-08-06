<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\


interface ICumplimiento_acompanamientoDao {

    /**
     * Guarda un objeto Cumplimiento_acompanamiento en la base de datos.
     * @param cumplimiento_acompanamiento objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cumplimiento_acompanamiento);
    /**
     * Modifica un objeto Cumplimiento_acompanamiento en la base de datos.
     * @param cumplimiento_acompanamiento objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cumplimiento_acompanamiento);
    /**
     * Elimina un objeto Cumplimiento_acompanamiento en la base de datos.
     * @param cumplimiento_acompanamiento objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cumplimiento_acompanamiento);
    /**
     * Busca un objeto Cumplimiento_acompanamiento en la base de datos.
     * @param cumplimiento_acompanamiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cumplimiento_acompanamiento);
    /**
     * Lista todos los objetos Cumplimiento_acompanamiento en la base de datos.
     * @return Array<Cumplimiento_acompanamiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!