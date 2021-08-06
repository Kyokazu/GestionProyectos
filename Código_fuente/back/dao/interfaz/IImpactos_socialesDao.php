<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\


interface IImpactos_socialesDao {

    /**
     * Guarda un objeto Impactos_sociales en la base de datos.
     * @param impactos_sociales objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($impactos_sociales);
    /**
     * Modifica un objeto Impactos_sociales en la base de datos.
     * @param impactos_sociales objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($impactos_sociales);
    /**
     * Elimina un objeto Impactos_sociales en la base de datos.
     * @param impactos_sociales objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($impactos_sociales);
    /**
     * Busca un objeto Impactos_sociales en la base de datos.
     * @param impactos_sociales objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($impactos_sociales);
    /**
     * Lista todos los objetos Impactos_sociales en la base de datos.
     * @return Array<Impactos_sociales> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!