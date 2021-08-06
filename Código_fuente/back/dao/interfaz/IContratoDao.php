<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\


interface IContratoDao {

    /**
     * Guarda un objeto Contrato en la base de datos.
     * @param contrato objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($contrato);
    /**
     * Modifica un objeto Contrato en la base de datos.
     * @param contrato objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($contrato);
    /**
     * Elimina un objeto Contrato en la base de datos.
     * @param contrato objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($contrato);
    /**
     * Busca un objeto Contrato en la base de datos.
     * @param contrato objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($contrato);
    /**
     * Lista todos los objetos Contrato en la base de datos.
     * @return Array<Contrato> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!