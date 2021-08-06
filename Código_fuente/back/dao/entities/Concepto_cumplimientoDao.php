<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    La vie est composé de combien de fois nous rions avant de mourir  \\

include_once realpath('../dao/interfaz/IConcepto_cumplimientoDao.php');
include_once realpath('../dto/Concepto_cumplimiento.php');

class Concepto_cumplimientoDao implements IConcepto_cumplimientoDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Concepto_cumplimiento en la base de datos.
     * @param concepto_cumplimiento objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($concepto_cumplimiento) {

        $id_proyecto = $concepto_cumplimiento->getId_proyecto();
        $nombre_investigador = $concepto_cumplimiento->getNombre_investigador();
        $nombre_proyecto = $concepto_cumplimiento->getNombre_proyecto();
        $condicion_investigador = $concepto_cumplimiento->getCondicion_investigador();
        $vb_director_departamento = "En trámite";
        $vb_representante_facultad = "En trámite";

        try {
            $sql = "INSERT INTO `concepto_cumplimiento`(`id_proyecto`, `nombre_investigador`, `nombre_proyecto`, `condicion_investigador`, `vb_director_departamento`, `vb_representante_facultad`)"
                    . "VALUES ('$id_proyecto','$nombre_investigador','$nombre_proyecto','$condicion_investigador', '$vb_director_departamento','$vb_representante_facultad')";
            //    var_dump($sql);
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Concepto_cumplimiento en la base de datos.
     * @param concepto_cumplimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($concepto_cumplimiento) {
        $id = $concepto_cumplimiento->getId();
        try {
            $sql = "SELECT `id`, `id_proyecto`, `nombre_investigador`, `nombre_proyecto`, `condicion_investigador`,`vb_director_departamento`,`fecha_solicitud`"
                    . "FROM `concepto_cumplimiento`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $concepto_cumplimiento->setId_proyecto($data[$i]['id_proyecto']);
                $concepto_cumplimiento->setNombre_investigador($data[$i]['nombre_investigador']);
                $concepto_cumplimiento->setNombre_proyecto($data[$i]['nombre_proyecto']);
                $concepto_cumplimiento->setCondicion_investigador($data[$i]['condicion_investigador']);
                $concepto_cumplimiento->setVb_director_departamento($data[$i]['vb_director_departamento']);
                $concepto_cumplimiento->setFecha_solicitud($data[$i]['fecha_solicitud']);
            }
            return $concepto_cumplimiento;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function update($concepto_cumplimiento) {
        $id = $concepto_cumplimiento->getId();
        $id_proyecto = $concepto_cumplimiento->getId_proyecto();
        $nombre_investigador = $concepto_cumplimiento->getNombre_investigador();
        $nombre_proyecto = $concepto_cumplimiento->getNombre_proyecto();
        $condicion_investigador = $concepto_cumplimiento->getCondicion_investigador();

        try {
            $sql = "UPDATE `concepto_cumplimiento` SET`id`='$id' ,`id_proyecto`='$id_proyecto' ,`nombre_investigador`='$nombre_investigador' ,`nombre_proyecto`='$nombre_proyecto' ,`condicion_investigador`='$condicion_investigador' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update2($concepto_cumplimiento) {
        $id = $concepto_cumplimiento->getId();
        $vb_director_departamento = "Aprobado por Director de Departamento";

        try {
            $sql = "UPDATE `concepto_cumplimiento` SET`vb_director_departamento`='$vb_director_departamento' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update3($concepto_cumplimiento) {
        $id = $concepto_cumplimiento->getId();
        $vb_representante_facultad = "Aprobado por Representante de Facultad";

        try {
            $sql = "UPDATE `concepto_cumplimiento` SET`vb_representante_facultad`='$vb_representante_facultad' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update4($concepto_cumplimiento) {
        $id = $concepto_cumplimiento->getId();
        $vb_representante_facultad = "Rechazado por Representante de Facultad";

        try {
            $sql = "UPDATE `concepto_cumplimiento` SET`vb_representante_facultad`='$vb_representante_facultad' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Concepto_cumplimiento en la base de datos.
     * @param concepto_cumplimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($concepto_cumplimiento) {
        $id = $concepto_cumplimiento->getId();

        try {
            $sql = "DELETE FROM `concepto_cumplimiento` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Concepto_cumplimiento en la base de datos.
     * @return ArrayList<Concepto_cumplimiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `id_proyecto`, `nombre_investigador`, `nombre_proyecto`, `condicion_investigador`,`vb_director_departamento`,`vb_representante_facultad`,`fecha_solicitud`"
                    . "FROM `concepto_cumplimiento`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $concepto_cumplimiento = new Concepto_cumplimiento();
                $concepto_cumplimiento->setId($data[$i]['id']);
                $concepto_cumplimiento->setId_proyecto($data[$i]['id_proyecto']);
                $concepto_cumplimiento->setNombre_investigador($data[$i]['nombre_investigador']);
                $concepto_cumplimiento->setNombre_proyecto($data[$i]['nombre_proyecto']);
                $concepto_cumplimiento->setCondicion_investigador($data[$i]['condicion_investigador']);
                $concepto_cumplimiento->setVb_director_departamento($data[$i]['vb_director_departamento']);
                $concepto_cumplimiento->setVb_representante_facultad($data[$i]['vb_representante_facultad']);
                $concepto_cumplimiento->setFecha_solicitud($data[$i]['fecha_solicitud']);

                array_push($lista, $concepto_cumplimiento);
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