<?php


interface ICompromisos_equipoDao {

    /**
     * Guarda un objeto Compromisos_equipo en la base de datos.
     * @param compromisos_equipo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($compromisos_equipo);
    /**
     * Modifica un objeto Compromisos_equipo en la base de datos.
     * @param compromisos_equipo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($compromisos_equipo);
    /**
     * Elimina un objeto Compromisos_equipo en la base de datos.
     * @param compromisos_equipo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($compromisos_equipo);
    /**
     * Busca un objeto Compromisos_equipo en la base de datos.
     * @param compromisos_equipo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($compromisos_equipo);
    /**
     * Lista todos los objetos Compromisos_equipo en la base de datos.
     * @return Array<Compromisos_equipo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!