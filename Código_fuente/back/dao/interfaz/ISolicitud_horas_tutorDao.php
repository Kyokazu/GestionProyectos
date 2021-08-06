<?php

interface ISolicitud_horas_tutorDao {

    /**
     * Guarda un objeto Solicitud_horas_tutor en la base de datos.
     * @param solicitud_horas_tutor objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($solicitud_horas_tutor);
    /**
     * Modifica un objeto Solicitud_horas_tutor en la base de datos.
     * @param solicitud_horas_tutor objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($solicitud_horas_tutor);
    /**
     * Elimina un objeto Solicitud_horas_tutor en la base de datos.
     * @param solicitud_horas_tutor objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($solicitud_horas_tutor);
    /**
     * Busca un objeto Solicitud_horas_tutor en la base de datos.
     * @param solicitud_horas_tutor objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($solicitud_horas_tutor);
    /**
     * Lista todos los objetos Solicitud_horas_tutor en la base de datos.
     * @return Array<Solicitud_horas_tutor> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!