<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    In Anarchy we trust  \\


interface ISolicitud_horas_financiadoDao {

    /**
     * Guarda un objeto Solicitud_horas_financiado en la base de datos.
     * @param solicitud_horas_financiado objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($solicitud_horas_financiado);
    /**
     * Modifica un objeto Solicitud_horas_financiado en la base de datos.
     * @param solicitud_horas_financiado objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($solicitud_horas_financiado);
    /**
     * Elimina un objeto Solicitud_horas_financiado en la base de datos.
     * @param solicitud_horas_financiado objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($solicitud_horas_financiado);
    /**
     * Busca un objeto Solicitud_horas_financiado en la base de datos.
     * @param solicitud_horas_financiado objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($solicitud_horas_financiado);
    /**
     * Lista todos los objetos Solicitud_horas_financiado en la base de datos.
     * @return Array<Solicitud_horas_financiado> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!