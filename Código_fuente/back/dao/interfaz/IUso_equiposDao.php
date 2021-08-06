<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En un lugar de La Mancha, de cuyo nombre no quiero acordarme...  \\


interface IUso_equiposDao {

    /**
     * Guarda un objeto Uso_equipos en la base de datos.
     * @param uso_equipos objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($uso_equipos);
    /**
     * Modifica un objeto Uso_equipos en la base de datos.
     * @param uso_equipos objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($uso_equipos);
    /**
     * Elimina un objeto Uso_equipos en la base de datos.
     * @param uso_equipos objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($uso_equipos);
    /**
     * Busca un objeto Uso_equipos en la base de datos.
     * @param uso_equipos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($uso_equipos);
    /**
     * Lista todos los objetos Uso_equipos en la base de datos.
     * @return Array<Uso_equipos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!