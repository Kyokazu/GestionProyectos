<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\

include_once realpath('../dao/interfaz/IInforme_gestion_jovenesDao.php');
include_once realpath('../dto/Informe_gestion_jovenes.php');

class Informe_gestion_jovenesDao implements IInforme_gestion_jovenesDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Informe_gestion_jovenes en la base de datos.
     * @param informe_gestion_jovenes objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($informe_gestion_jovenes) {

        $facultad = $informe_gestion_jovenes->getFacultad();
        $grupo_investigacion = $informe_gestion_jovenes->getGrupo_investigacion();
        $departamento = $informe_gestion_jovenes->getDepartamento();
        $nombre_tutor = $informe_gestion_jovenes->getNombre_tutor();
        $linea_investigacion = $informe_gestion_jovenes->getLinea_investigacion();
        $nombre_joven = $informe_gestion_jovenes->getNombre_joven();
        $convenio_colciencias = $informe_gestion_jovenes->getConvenio_colciencias();
        $numero_convocatoria = $informe_gestion_jovenes->getNumero_convocatoria();
        $periodo_tutoria = $informe_gestion_jovenes->getPeriodo_tutoria();
        $vb_director_grupo = "En trámite";
        $vb_director_departamento = "En trámite";
        $vb_representante_facultad = "En trámite";

        try {
            $sql = "INSERT INTO `informe_gestion_jovenes`(`facultad`, `grupo_investigacion`, `departamento`, `nombre_tutor`, `linea_investigacion`, `nombre_joven`, `convenio_colciencias`, `numero_convocatoria`, `periodo_tutoria`, `vb_director_grupo`, `vb_director_departamento`, `vb_representante_facultad`)"
                    . "VALUES ('$facultad','$grupo_investigacion','$departamento','$nombre_tutor','$linea_investigacion','$nombre_joven','$convenio_colciencias','$numero_convocatoria','$periodo_tutoria','$vb_director_grupo','$vb_director_departamento','$vb_representante_facultad')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Informe_gestion_jovenes en la base de datos.
     * @param informe_gestion_jovenes objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($informe_gestion_jovenes) {
        $id = $informe_gestion_jovenes->getId();

        try {
            $sql = "SELECT `id`, `facultad`, `grupo_investigacion`, `departamento`, `nombre_tutor`, `linea_investigacion`, `nombre_joven`, `convenio_colciencias`, `numero_convocatoria`, `periodo_tutoria`"
                    . "FROM `informe_gestion_jovenes`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $informe_gestion_jovenes->setId($data[$i]['id']);
                $informe_gestion_jovenes->setFacultad($data[$i]['facultad']);
                $informe_gestion_jovenes->setGrupo_investigacion($data[$i]['grupo_investigacion']);
                $informe_gestion_jovenes->setDepartamento($data[$i]['departamento']);
                $informe_gestion_jovenes->setNombre_tutor($data[$i]['nombre_tutor']);
                $informe_gestion_jovenes->setLinea_investigacion($data[$i]['linea_investigacion']);
                $informe_gestion_jovenes->setNombre_joven($data[$i]['nombre_joven']);
                $informe_gestion_jovenes->setConvenio_colciencias($data[$i]['convenio_colciencias']);
                $informe_gestion_jovenes->setNumero_convocatoria($data[$i]['numero_convocatoria']);
                $informe_gestion_jovenes->setPeriodo_tutoria($data[$i]['periodo_tutoria']);
            }
            return $informe_gestion_jovenes;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Informe_gestion_jovenes en la base de datos.
     * @param informe_gestion_jovenes objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($informe_gestion_jovenes) {
        $id = $informe_gestion_jovenes->getId();
        $facultad = $informe_gestion_jovenes->getFacultad();
        $grupo_investigacion = $informe_gestion_jovenes->getGrupo_investigacion();
        $departamento = $informe_gestion_jovenes->getDepartamento();
        $nombre_tutor = $informe_gestion_jovenes->getNombre_tutor();
        $linea_investigacion = $informe_gestion_jovenes->getLinea_investigacion();
        $nombre_joven = $informe_gestion_jovenes->getNombre_joven();
        $convenio_colciencias = $informe_gestion_jovenes->getConvenio_colciencias();
        $numero_convocatoria = $informe_gestion_jovenes->getNumero_convocatoria();
        $periodo_tutoria = $informe_gestion_jovenes->getPeriodo_tutoria();

        try {
            $sql = "UPDATE `informe_gestion_jovenes` SET`id`='$id' ,`facultad`='$facultad' ,`grupo_investigacion`='$grupo_investigacion' ,`departamento`='$departamento' ,`nombre_tutor`='$nombre_tutor' ,`linea_investigacion`='$linea_investigacion' ,`nombre_joven`='$nombre_joven' ,`convenio_colciencias`='$convenio_colciencias' ,`numero_convocatoria`='$numero_convocatoria' ,`periodo_tutoria`='$periodo_tutoria' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update2($informe_gestion_jovenes) {
        $id = $informe_gestion_jovenes->getId();
        $vb_director_departamento = "Aprobado por Director de Departamento";

        try {
            $sql = "UPDATE `informe_gestion_jovenes` SET`vb_director_departamento`='$vb_director_departamento' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update3($informe_gestion_jovenes) {
        $id = $informe_gestion_jovenes->getId();
        $vb_representante_facultad = "Aprobado por Representante de Facultad";

        try {
            $sql = "UPDATE `informe_gestion_jovenes` SET`vb_representante_facultad`='$vb_representante_facultad' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update4($informe_gestion_jovenes) {
        $id = $informe_gestion_jovenes->getId();
        $vb_representante_facultad = "Rechazar por Representante de Facultad";

        try {
            $sql = "UPDATE `informe_gestion_jovenes` SET`vb_representante_facultad`='$vb_representante_facultad' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Informe_gestion_jovenes en la base de datos.
     * @param informe_gestion_jovenes objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($informe_gestion_jovenes) {
        $id = $informe_gestion_jovenes->getId();

        try {
            $sql = "DELETE FROM `informe_gestion_jovenes` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Informe_gestion_jovenes en la base de datos.
     * @return ArrayList<Informe_gestion_jovenes> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `facultad`, `grupo_investigacion`, `departamento`, `nombre_tutor`, `linea_investigacion`, `nombre_joven`, `convenio_colciencias`, `numero_convocatoria`, `periodo_tutoria`, `fecha_solicitud`, `vb_director_grupo`, `vb_director_departamento`,`vb_representante_facultad`"
                    . "FROM `informe_gestion_jovenes`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $informe_gestion_jovenes = new Informe_gestion_jovenes();
                $informe_gestion_jovenes->setId($data[$i]['id']);
                $informe_gestion_jovenes->setFacultad($data[$i]['facultad']);
                $informe_gestion_jovenes->setGrupo_investigacion($data[$i]['grupo_investigacion']);
                $informe_gestion_jovenes->setDepartamento($data[$i]['departamento']);
                $informe_gestion_jovenes->setNombre_tutor($data[$i]['nombre_tutor']);
                $informe_gestion_jovenes->setLinea_investigacion($data[$i]['linea_investigacion']);
                $informe_gestion_jovenes->setNombre_joven($data[$i]['nombre_joven']);
                $informe_gestion_jovenes->setConvenio_colciencias($data[$i]['convenio_colciencias']);
                $informe_gestion_jovenes->setNumero_convocatoria($data[$i]['numero_convocatoria']);
                $informe_gestion_jovenes->setPeriodo_tutoria($data[$i]['periodo_tutoria']);
                $informe_gestion_jovenes->setVb_director_grupo($data[$i]['vb_director_grupo']);
                $informe_gestion_jovenes->setVb_director_departamento($data[$i]['vb_director_departamento']);
                $informe_gestion_jovenes->setVb_representante_facultad($data[$i]['vb_representante_facultad']);
                $informe_gestion_jovenes->setFecha_solicitud($data[$i]['fecha_solicitud']);

                array_push($lista, $informe_gestion_jovenes);
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