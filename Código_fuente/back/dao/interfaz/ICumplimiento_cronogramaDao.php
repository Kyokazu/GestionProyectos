<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\


interface ICumplimiento_cronogramaDao {

    /**
     * Guarda un objeto Cumplimiento_cronograma en la base de datos.
     * @param cumplimiento_cronograma objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cumplimiento_cronograma);
    /**
     * Modifica un objeto Cumplimiento_cronograma en la base de datos.
     * @param cumplimiento_cronograma objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cumplimiento_cronograma);
    /**
     * Elimina un objeto Cumplimiento_cronograma en la base de datos.
     * @param cumplimiento_cronograma objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cumplimiento_cronograma);
    /**
     * Busca un objeto Cumplimiento_cronograma en la base de datos.
     * @param cumplimiento_cronograma objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cumplimiento_cronograma);
    /**
     * Lista todos los objetos Cumplimiento_cronograma en la base de datos.
     * @return Array<Cumplimiento_cronograma> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!