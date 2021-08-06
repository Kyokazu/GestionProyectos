<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella existió sólo en un sueño. Él es un poema que el poeta nunca escribió.  \\


interface IActividades_fueraDao {

    /**
     * Guarda un objeto Actividades_fuera en la base de datos.
     * @param actividades_fuera objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($actividades_fuera);
    /**
     * Modifica un objeto Actividades_fuera en la base de datos.
     * @param actividades_fuera objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($actividades_fuera);
    /**
     * Elimina un objeto Actividades_fuera en la base de datos.
     * @param actividades_fuera objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($actividades_fuera);
    /**
     * Busca un objeto Actividades_fuera en la base de datos.
     * @param actividades_fuera objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($actividades_fuera);
    /**
     * Lista todos los objetos Actividades_fuera en la base de datos.
     * @return Array<Actividades_fuera> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!