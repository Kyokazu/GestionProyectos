<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\


interface ICumplimiento_objetivosDao {

    /**
     * Guarda un objeto Cumplimiento_objetivos en la base de datos.
     * @param cumplimiento_objetivos objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cumplimiento_objetivos);
    /**
     * Modifica un objeto Cumplimiento_objetivos en la base de datos.
     * @param cumplimiento_objetivos objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cumplimiento_objetivos);
    /**
     * Elimina un objeto Cumplimiento_objetivos en la base de datos.
     * @param cumplimiento_objetivos objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cumplimiento_objetivos);
    /**
     * Busca un objeto Cumplimiento_objetivos en la base de datos.
     * @param cumplimiento_objetivos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cumplimiento_objetivos);
    /**
     * Lista todos los objetos Cumplimiento_objetivos en la base de datos.
     * @return Array<Cumplimiento_objetivos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!