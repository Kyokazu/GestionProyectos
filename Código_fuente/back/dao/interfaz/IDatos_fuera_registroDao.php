<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\


interface IDatos_fuera_registroDao {

    /**
     * Guarda un objeto Datos_fuera_registro en la base de datos.
     * @param datos_fuera_registro objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($datos_fuera_registro);
    /**
     * Modifica un objeto Datos_fuera_registro en la base de datos.
     * @param datos_fuera_registro objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($datos_fuera_registro);
    /**
     * Elimina un objeto Datos_fuera_registro en la base de datos.
     * @param datos_fuera_registro objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($datos_fuera_registro);
    /**
     * Busca un objeto Datos_fuera_registro en la base de datos.
     * @param datos_fuera_registro objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($datos_fuera_registro);
    /**
     * Lista todos los objetos Datos_fuera_registro en la base de datos.
     * @return Array<Datos_fuera_registro> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!