<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Esta es tu vida y se acaba a cada minuto.  \\

include_once realpath('../dao/interfaz/ISolicitud_horas_financiadoDao.php');
include_once realpath('../dto/Solicitud_horas_financiado.php');

class Solicitud_horas_financiadoDao implements ISolicitud_horas_financiadoDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Solicitud_horas_financiado en la base de datos.
     * @param solicitud_horas_financiado objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($solicitud_horas_financiado) {

        $nombre_proyecto = $solicitud_horas_financiado->getNombre_proyecto();
        $id_proyecto = $solicitud_horas_financiado->getId_proyecto();
        $id_contrato = $solicitud_horas_financiado->getId_contrato();
        $fecha_ultimo_informe = $solicitud_horas_financiado->getFecha_ultimo_informe();
        $vb_director_grupo = "En tramite";
        $vb_representante_facultad = "En tramite";
        $fecha_solicitud = $solicitud_horas_financiado->getFecha_solicitud();

        try {
            $sql = "INSERT INTO `solicitud_horas_financiado`(`nombre_proyecto`,`id_proyecto`,`id_contrato`,`vb_director_grupo`,`vb_representante_facultad`,`fecha_solicitud`,`fecha_ultimo_informe`)"
                    . "VALUES ('$nombre_proyecto','$id_contrato','$id_proyecto', '$vb_director_grupo','$vb_representante_facultad','$fecha_solicitud','$fecha_ultimo_informe')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Solicitud_horas_financiado en la base de datos.
     * @param solicitud_horas_financiado objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($solicitud_horas_financiado) {
        $id = $solicitud_horas_financiado->getId();

        try {
            $sql = "SELECT `id`, `id_proyecto`, `id_contrato`"
                    . "FROM `solicitud_horas_financiado`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $solicitud_horas_financiado->setId($data[$i]['id']);
                $solicitud_horas_financiado->setId_proyecto($data[$i]['id_proyecto']);
                $solicitud_horas_financiado->setId_contrato($data[$i]['id_contrato']);
            }
            return $solicitud_horas_financiado;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Solicitud_horas_financiado en la base de datos.
     * @param solicitud_horas_financiado objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($solicitud_horas_financiado) {
        $id = $solicitud_horas_financiado->getId();
        $id_proyecto = $solicitud_horas_financiado->getId_proyecto();
        $id_contrato = $solicitud_horas_financiado->getId_contrato();

        try {
            $sql = "UPDATE `solicitud_horas_financiado` SET`id`='$id' ,`id_proyecto`='$id_proyecto' ,`id_contrato`='$id_contrato' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update2($solicitud_horas_financiado) {
        $id = $solicitud_horas_financiado->getId();
        $vb_director_departamento = "Aprobado por Director de Departamento";


        try {
            $sql = "UPDATE `solicitud_horas_financiado` SET`id`='$id' ,`vb_director_departamento`='$vb_director_departamento' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }
    
     public function update3($solicitud_horas_financiado) {
        $id = $solicitud_horas_financiado->getId();
        $vb_representante_facultad = "Aprobado por Representante de Facultad";
        try {
            $sql = "UPDATE `solicitud_horas_financiado` SET`id`='$id' ,`vb_representante_facultad`='$vb_representante_facultad' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }
    
    public function update4($solicitud_horas_financiado) {
        $id = $solicitud_horas_financiado->getId();
        $vb_representante_facultad = "Rechazado por Representante de Facultad";
        try {
            $sql = "UPDATE `solicitud_horas_financiado` SET`id`='$id' ,`vb_representante_facultad`='$vb_representante_facultad' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Solicitud_horas_financiado en la base de datos.
     * @param solicitud_horas_financiado objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($solicitud_horas_financiado) {
        $id = $solicitud_horas_financiado->getId();

        try {
            $sql = "DELETE FROM `solicitud_horas_financiado` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Solicitud_horas_financiado en la base de datos.
     * @return ArrayList<Solicitud_horas_financiado> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`,`nombre_proyecto`, `fecha_solicitud`,`vb_director_grupo`,`vb_representante_facultad`"
                    . "FROM `solicitud_horas_financiado`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $solicitud_horas_financiado = new Solicitud_horas_financiado();
                $solicitud_horas_financiado->setId($data[$i]['id']);
                $solicitud_horas_financiado->setNombre_proyecto($data[$i]['nombre_proyecto']);
                $solicitud_horas_financiado->setFecha_solicitud($data[$i]['fecha_solicitud']);
                $solicitud_horas_financiado->setVb_director_grupo($data[$i]['vb_director_grupo']);
                $solicitud_horas_financiado->setVb_representante_facultad($data[$i]['vb_representante_facultad']);
                array_push($lista, $solicitud_horas_financiado);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function listAll2() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `nombre_proyecto`, `fecha_solicitud`,`vb_director_grupo`,`vb_representante_facultad`"
                    . "FROM `solicitud_horas_financiado`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $solicitud_horas_financiado = new Solicitud_horas_financiado();
                $solicitud_horas_financiado->setId($data[$i]['id']);
                $solicitud_horas_financiado->setNombre_proyecto($data[$i]['nombre_proyecto']);
                $solicitud_horas_financiado->setVb_director_grupo($data[$i]['vb_director_grupo']);
                $solicitud_horas_financiado->setVb_representante_facultad($data[$i]['vb_representante_facultad']);

                array_push($lista, $solicitud_horas_financiado);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function listAll3() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `nombre_proyecto`, `fecha_solicitud`,`vb_director_grupo`,`vb_representante_facultad`"
                    . "FROM `solicitud_horas_financiado`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $solicitud_horas_financiado = new Solicitud_horas_financiado();
                $solicitud_horas_financiado->setId($data[$i]['id']);
                $solicitud_horas_financiado->setNombre_proyecto($data[$i]['nombre_proyecto']);
                $solicitud_horas_financiado->setFecha_solicitud($data[$i]['fecha_solicitud']);
                $solicitud_horas_financiado->setVb_director_grupo($data[$i]['vb_director_grupo']);
                $solicitud_horas_financiado->setVb_representante_facultad($data[$i]['vb_representante_facultad']);
                array_push($lista, $solicitud_horas_financiado);
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