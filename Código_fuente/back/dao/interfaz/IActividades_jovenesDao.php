<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    -¡UNO! -¡¡ +4 !!  \\


interface IActividades_jovenesDao {

    /**
     * Guarda un objeto Actividades_jovenes en la base de datos.
     * @param actividades_jovenes objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($actividades_jovenes);
    /**
     * Modifica un objeto Actividades_jovenes en la base de datos.
     * @param actividades_jovenes objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($actividades_jovenes);
    /**
     * Elimina un objeto Actividades_jovenes en la base de datos.
     * @param actividades_jovenes objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($actividades_jovenes);
    /**
     * Busca un objeto Actividades_jovenes en la base de datos.
     * @param actividades_jovenes objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($actividades_jovenes);
    /**
     * Lista todos los objetos Actividades_jovenes en la base de datos.
     * @return Array<Actividades_jovenes> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!