<?php

include_once realpath('../dao/interfaz/ISolicitud_horas_tutorDao.php');
include_once realpath('../dto/Solicitud_horas_tutor.php');
include_once realpath('../dto/Docente.php');
include_once realpath('../dto/Contrato.php');

class Solicitud_horas_tutorDao implements ISolicitud_horas_tutorDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Solicitud_horas_tutor en la base de datos.
     * @param solicitud_horas_tutor objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($solicitud_horas_tutor) {

        $nombre_docente = $solicitud_horas_tutor->getNombre_docente();
        $nombre_convenio = $solicitud_horas_tutor->getNombre_convenio();
        $grupo_investigacion = $solicitud_horas_tutor->getGrupo_investigacion();
        $nombre_propuesta = $solicitud_horas_tutor->getNombre_propuesta();
        $fecha_inicio_joven = $solicitud_horas_tutor->getFecha_inicio_joven();
        $horas_solicitadas = $solicitud_horas_tutor->getHoras_solicitadas();
        $numero_acta = $solicitud_horas_tutor->getNumero_acta();
        $tipo_tutor = $solicitud_horas_tutor->getTipo_tutor();
        $semestre = $solicitud_horas_tutor->getSemestre();
        $vb_director_grupo = "En tramite";
        $vb_representante_facultad = "En tramite";

        try {
            $sql = "INSERT INTO `solicitud_horas_tutor`(`nombre_docente`, `nombre_convenio`, `grupo_investigacion`, `nombre_propuesta`, `fecha_inicio_joven`, `horas_solicitadas`,"
                    . " `numero_acta`, `tipo_tutor`, `semestre`, `vb_director_grupo`, `vb_representante_facultad`)"
                    . "VALUES ('$nombre_docente','$nombre_convenio','$grupo_investigacion','$nombre_propuesta','$fecha_inicio_joven','$horas_solicitadas',"
                    . "'$numero_acta','$tipo_tutor','$semestre','$vb_director_grupo','$vb_representante_facultad')";
            // var_dump($sql);
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Solicitud_horas_tutor en la base de datos.
     * @param solicitud_horas_tutor objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($solicitud_horas_tutor) {
        $id = $solicitud_horas_tutor->getId();

        try {
            $sql = "SELECT `id`, `docente_id`, `nombre_convenio`, `grupo_investigacion`, `nombre_propuesta`, `contrato_id`, `fecha_inicio_joven`, `horas_solicitadas`"
                    . "FROM `solicitud_horas_tutor`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $solicitud_horas_tutor->setId($data[$i]['id']);
                $docente = new Docente();
                $docente->setId($data[$i]['docente_id']);
                $solicitud_horas_tutor->setDocente_id($docente);
                $solicitud_horas_tutor->setNombre_convenio($data[$i]['nombre_convenio']);
                $solicitud_horas_tutor->setGrupo_investigacion($data[$i]['grupo_investigacion']);
                $solicitud_horas_tutor->setNombre_propuesta($data[$i]['nombre_propuesta']);
                $contrato = new Contrato();
                $contrato->setId($data[$i]['contrato_id']);
                $solicitud_horas_tutor->setContrato_id($contrato);
                $solicitud_horas_tutor->setFecha_inicio_joven($data[$i]['fecha_inicio_joven']);
                $solicitud_horas_tutor->setHoras_solicitadas($data[$i]['horas_solicitadas']);
            }
            return $solicitud_horas_tutor;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Solicitud_horas_tutor en la base de datos.
     * @param solicitud_horas_tutor objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($solicitud_horas_tutor) {
        $id = $solicitud_horas_tutor->getId();
        $docente_id = $solicitud_horas_tutor->getDocente_id()->getId();
        $nombre_convenio = $solicitud_horas_tutor->getNombre_convenio();
        $grupo_investigacion = $solicitud_horas_tutor->getGrupo_investigacion();
        $nombre_propuesta = $solicitud_horas_tutor->getNombre_propuesta();
        $contrato_id = $solicitud_horas_tutor->getContrato_id()->getId();
        $fecha_inicio_joven = $solicitud_horas_tutor->getFecha_inicio_joven();
        $horas_solicitadas = $solicitud_horas_tutor->getHoras_solicitadas();

        try {
            $sql = "UPDATE `solicitud_horas_tutor` SET`id`='$id' ,`docente_id`='$docente_id' ,`nombre_convenio`='$nombre_convenio' ,`grupo_investigacion`='$grupo_investigacion' ,`nombre_propuesta`='$nombre_propuesta' ,`contrato_id`='$contrato_id' ,`fecha_inicio_joven`='$fecha_inicio_joven' ,`horas_solicitadas`='$horas_solicitadas' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update2($solicitud_horas_tutor) {
        $id = $solicitud_horas_tutor->getId();
        $vb_representante_facultad = "Aprobado por Representante de Facultad";
        try {
            $sql = "UPDATE `solicitud_horas_tutor` SET `vb_representante_facultad`='$vb_representante_facultad' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update3($solicitud_horas_tutor) {
        $id = $solicitud_horas_tutor->getId();
        $vb_representante_facultad = "Rechazado por Representante de Facultad";
        try {
            $sql = "UPDATE `solicitud_horas_tutor` SET `vb_representante_facultad`='$vb_representante_facultad' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Solicitud_horas_tutor en la base de datos.
     * @param solicitud_horas_tutor objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($solicitud_horas_tutor) {
        $id = $solicitud_horas_tutor->getId();

        try {
            $sql = "DELETE FROM `solicitud_horas_tutor` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Solicitud_horas_tutor en la base de datos.
     * @return ArrayList<Solicitud_horas_tutor> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`,`nombre_docente`, `nombre_convenio`, `grupo_investigacion`, `nombre_propuesta`, `fecha_inicio_joven`, `horas_solicitadas`,"
                    . " `numero_acta`, `tipo_tutor`, `semestre`,`fecha_solicitud`, `vb_director_grupo`, `vb_representante_facultad`"
                    . "FROM `solicitud_horas_tutor`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $solicitud_horas_tutor = new Solicitud_horas_tutor();
                $solicitud_horas_tutor->setId($data[$i]['id']);
                $solicitud_horas_tutor->setNombre_docente($data[$i]['nombre_docente']);
                $solicitud_horas_tutor->setNombre_convenio($data[$i]['nombre_convenio']);
                $solicitud_horas_tutor->setGrupo_investigacion($data[$i]['grupo_investigacion']);
                $solicitud_horas_tutor->setNombre_propuesta($data[$i]['nombre_propuesta']);
                $solicitud_horas_tutor->setFecha_inicio_joven($data[$i]['fecha_inicio_joven']);
                $solicitud_horas_tutor->setHoras_solicitadas($data[$i]['horas_solicitadas']);
                $solicitud_horas_tutor->setNumero_acta('numero_acta');
                $solicitud_horas_tutor->setTipo_tutor($data[$i]['tipo_tutor']);
                $solicitud_horas_tutor->setSemestre($data[$i]['semestre']);
                $solicitud_horas_tutor->setFecha_solicitud($data[$i]['fecha_solicitud']);
                $solicitud_horas_tutor->setVb_director_grupo($data[$i]['vb_director_grupo']);
                $solicitud_horas_tutor->setVb_representante_facultad($data[$i]['vb_representante_facultad']);


                array_push($lista, $solicitud_horas_tutor);
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