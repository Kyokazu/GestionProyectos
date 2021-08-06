<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Don´t call me gringo you f%&ing beanner  \\

include_once realpath('../dao/interfaz/ICumplimiento_acompanamientoDao.php');
include_once realpath('../dto/Cumplimiento_acompanamiento.php');

class Cumplimiento_acompanamientoDao implements ICumplimiento_acompanamientoDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Cumplimiento_acompanamiento en la base de datos.
     * @param cumplimiento_acompanamiento objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($cumplimiento_acompanamiento) {

        $nombre_tutor = $cumplimiento_acompanamiento->getNombre_tutor();
        $nombre_joven = $cumplimiento_acompanamiento->getNombre_joven();
        $estado_solicitud = "En trámite";

        try {
            $sql = "INSERT INTO `cumplimiento_acompanamiento`( `nombre_tutor`, `nombre_joven`, `estado_solicitud`)"
                    . "VALUES ('$nombre_tutor','$nombre_joven','$estado_solicitud')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Cumplimiento_acompanamiento en la base de datos.
     * @param cumplimiento_acompanamiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($cumplimiento_acompanamiento) {
        $id = $cumplimiento_acompanamiento->getId();

        try {
            $sql = "SELECT `id`, `nombre_joven`, `nombre_tutor`"
                    . "FROM `cumplimiento_acompanamiento`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $cumplimiento_acompanamiento->setId($data[$i]['id']);
                $cumplimiento_acompanamiento->setNombre_joven($data[$i]['nombre_joven']);
                $cumplimiento_acompanamiento->setNombre_tutor($data[$i]['nombre_tutor']);
            }
            return $cumplimiento_acompanamiento;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Cumplimiento_acompanamiento en la base de datos.
     * @param cumplimiento_acompanamiento objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($cumplimiento_acompanamiento) {
        $id = $cumplimiento_acompanamiento->getId();
        $nombre_joven = $cumplimiento_acompanamiento->getNombre_joven();
        $nombre_tutor = $cumplimiento_acompanamiento->getNombre_tutor();

        try {
            $sql = "UPDATE `cumplimiento_acompanamiento` SET`id`='$id' ,`nombre_joven`='$nombre_joven' ,`nombre_tutor`='$nombre_tutor' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update2($cumplimiento_acompanamiento) {
        $id = $cumplimiento_acompanamiento->getId();
        $estado_solicitud = "Aprobado por Director de Departamento";

        try {
            $sql = "UPDATE `cumplimiento_acompanamiento` SET`estado_solicitud`='$estado_solicitud' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Cumplimiento_acompanamiento en la base de datos.
     * @param cumplimiento_acompanamiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($cumplimiento_acompanamiento) {
        $id = $cumplimiento_acompanamiento->getId();

        try {
            $sql = "DELETE FROM `cumplimiento_acompanamiento` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Cumplimiento_acompanamiento en la base de datos.
     * @return ArrayList<Cumplimiento_acompanamiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`,`nombre_tutor`, `nombre_joven`, `fecha_solicitud`, `estado_solicitud`"
                    . "FROM `cumplimiento_acompanamiento`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $cumplimiento_acompanamiento = new Cumplimiento_acompanamiento();

                $cumplimiento_acompanamiento->setId($data[$i]['id']);
                $cumplimiento_acompanamiento->setNombre_tutor($data[$i]['nombre_tutor']);
                $cumplimiento_acompanamiento->setNombre_joven($data[$i]['nombre_joven']);
                $cumplimiento_acompanamiento->setEstado_solicitud($data[$i]['estado_solicitud']);
                $cumplimiento_acompanamiento->setFecha_solicitud($data[$i]['fecha_solicitud']);


                array_push($lista, $cumplimiento_acompanamiento);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function insertarConsulta($sql) {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $sentencia = null;
        return $this->cn->lastInsertId();
    }

    public function ejecutarConsulta($sql) {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetchAll();
        $sentencia = null;
        return $data;
    }

    /**
     * Cierra la conexión actual a la base de datos
     */
    public function close() {
        $cn = null;
    }

}

//That`s all folks!