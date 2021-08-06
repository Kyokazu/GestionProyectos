<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Anarchy! Apoyando la vagancia desde 2017  \\


interface ICumplimiento_objetivos_copy1_copy2Dao {

    /**
     * Guarda un objeto Cumplimiento_objetivos_copy1_copy2 en la base de datos.
     * @param cumplimiento_objetivos_copy1_copy2 objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cumplimiento_objetivos_copy1_copy2);
    /**
     * Modifica un objeto Cumplimiento_objetivos_copy1_copy2 en la base de datos.
     * @param cumplimiento_objetivos_copy1_copy2 objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cumplimiento_objetivos_copy1_copy2);
    /**
     * Elimina un objeto Cumplimiento_objetivos_copy1_copy2 en la base de datos.
     * @param cumplimiento_objetivos_copy1_copy2 objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cumplimiento_objetivos_copy1_copy2);
    /**
     * Busca un objeto Cumplimiento_objetivos_copy1_copy2 en la base de datos.
     * @param cumplimiento_objetivos_copy1_copy2 objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cumplimiento_objetivos_copy1_copy2);
    /**
     * Lista todos los objetos Cumplimiento_objetivos_copy1_copy2 en la base de datos.
     * @return Array<Cumplimiento_objetivos_copy1_copy2> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!