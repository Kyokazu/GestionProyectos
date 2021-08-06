<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\


interface IInforme_gestion_semilleroDao {

    /**
     * Guarda un objeto Informe_gestion_semillero en la base de datos.
     * @param informe_gestion_semillero objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($informe_gestion_semillero);
    /**
     * Modifica un objeto Informe_gestion_semillero en la base de datos.
     * @param informe_gestion_semillero objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($informe_gestion_semillero);
    /**
     * Elimina un objeto Informe_gestion_semillero en la base de datos.
     * @param informe_gestion_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($informe_gestion_semillero);
    /**
     * Busca un objeto Informe_gestion_semillero en la base de datos.
     * @param informe_gestion_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($informe_gestion_semillero);
    /**
     * Lista todos los objetos Informe_gestion_semillero en la base de datos.
     * @return Array<Informe_gestion_semillero> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!