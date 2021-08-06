<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\


interface IConcepto_cumplimientoDao {

    /**
     * Guarda un objeto Concepto_cumplimiento en la base de datos.
     * @param concepto_cumplimiento objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($concepto_cumplimiento);
    /**
     * Modifica un objeto Concepto_cumplimiento en la base de datos.
     * @param concepto_cumplimiento objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($concepto_cumplimiento);
    /**
     * Elimina un objeto Concepto_cumplimiento en la base de datos.
     * @param concepto_cumplimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($concepto_cumplimiento);
    /**
     * Busca un objeto Concepto_cumplimiento en la base de datos.
     * @param concepto_cumplimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($concepto_cumplimiento);
    /**
     * Lista todos los objetos Concepto_cumplimiento en la base de datos.
     * @return Array<Concepto_cumplimiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!