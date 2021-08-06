<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Caminante no hay camino, se hace camino al andar  \\


interface IDatos_Dao {

    /**
     * Guarda un objeto Datos_ en la base de datos.
     * @param datos_ objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($datos_);
    /**
     * Modifica un objeto Datos_ en la base de datos.
     * @param datos_ objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($datos_);
    /**
     * Elimina un objeto Datos_ en la base de datos.
     * @param datos_ objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($datos_);
    /**
     * Busca un objeto Datos_ en la base de datos.
     * @param datos_ objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($datos_);
    /**
     * Lista todos los objetos Datos_ en la base de datos.
     * @return Array<Datos_> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!