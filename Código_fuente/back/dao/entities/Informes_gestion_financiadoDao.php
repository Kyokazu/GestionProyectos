<?php

include_once realpath('../dao/interfaz/IInformes_gestion_financiadoDao.php');
include_once realpath('../dto/Informes_gestion_financiado.php');

class Informes_gestion_financiadoDao implements IInformes_gestion_financiadoDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Informes_gestion_financiado en la base de datos.
     * @param informes_gestion_financiado objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($informes_gestion_financiado) {

        $id_proyecto = $informes_gestion_financiado->getId_proyecto();
        $grupo_investigacion = $informes_gestion_financiado->getGrupo_investigacion();
        $facultad = $informes_gestion_financiado->getFacultad();
        $representante_facultad = $informes_gestion_financiado->getRepresentante_facultad();
        $duracion_proyecto = $informes_gestion_financiado->getDuracion_proyecto();
        $estado_solicitud = "En trámite";


        try {
            $sql = "INSERT INTO `informes_gestion_financiado`(`id_proyecto`, `grupo_investigacion`, `facultad`, `representante_facultad`, `duracion_proyecto`,`estado_solicitud`)"
                    . "VALUES ('$id_proyecto','$grupo_investigacion','$facultad','$representante_facultad','$duracion_proyecto','$estado_solicitud')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function insert2($informes_gestion_financiado) {

        $id_proyecto = $informes_gestion_financiado->getId_proyecto();
        $grupo_investigacion = $informes_gestion_financiado->getGrupo_investigacion();
        $facultad = $informes_gestion_financiado->getFacultad();
        $representante_facultad = $informes_gestion_financiado->getRepresentante_facultad();
        $duracion_proyecto = $informes_gestion_financiado->getDuracion_proyecto();
        $novedades_proyecto = $informes_gestion_financiado->getNovedades_proyecto();
        $conclusiones = $informes_gestion_financiado->getConclusiones();
        $observaciones = $informes_gestion_financiado->getObservaciones();
        $estado_solicitud = "En trámite";


        try {
            $sql = "INSERT INTO `informes_gestion_financiado`(`id_proyecto`, `grupo_investigacion`, `facultad`, `representante_facultad`, `duracion_proyecto`,`estado_solicitud`,`novedades_proyecto`,`conclusiones`,`observaciones`)"
                    . "VALUES ('$id_proyecto','$grupo_investigacion','$facultad','$representante_facultad','$duracion_proyecto','$estado_solicitud','$novedades_proyecto','$conclusiones','$observaciones')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Informes_gestion_financiado en la base de datos.
     * @param informes_gestion_financiado objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($informes_gestion_financiado) {
        $id = $informes_gestion_financiado->getId();

        try {
            $sql = "SELECT `id`, `id_proyecto`, `grupo_investigacion`, `facultad`, `representante_facultad`, `duracion_proyecto`, `novedades_proyecto`, `conclusiones`, `observaciones`"
                    . "FROM `informes_gestion_financiado`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $informes_gestion_financiado->setId($data[$i]['id']);
                $informes_gestion_financiado->setId_proyecto($data[$i]['id_proyecto']);
                $informes_gestion_financiado->setGrupo_investigacion($data[$i]['grupo_investigacion']);
                $informes_gestion_financiado->setFacultad($data[$i]['facultad']);
                $informes_gestion_financiado->setRepresentante_facultad($data[$i]['representante_facultad']);
                $informes_gestion_financiado->setDuracion_proyecto($data[$i]['duracion_proyecto']);
                $informes_gestion_financiado->setNovedades_proyecto($data[$i]['novedades_proyecto']);
                $informes_gestion_financiado->setConclusiones($data[$i]['conclusiones']);
                $informes_gestion_financiado->setObservaciones($data[$i]['observaciones']);
            }
            return $informes_gestion_financiado;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Informes_gestion_financiado en la base de datos.
     * @param informes_gestion_financiado objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($informes_gestion_financiado) {
        $id = $informes_gestion_financiado->getId();
        $estado_solicitud = "Aprobada por Representante de Facultad";

        try {
            $sql = "UPDATE `informes_gestion_financiado` SET`estado_solicitud`='$estado_solicitud' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function update2($informes_gestion_financiado) {
        $id = $informes_gestion_financiado->getId();
        $estado_solicitud = "Rechazada por Representante de Facultad";

        try {
            $sql = "UPDATE `informes_gestion_financiado` SET`estado_solicitud`='$estado_solicitud' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Informes_gestion_financiado en la base de datos.
     * @param informes_gestion_financiado objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($informes_gestion_financiado) {
        $id = $informes_gestion_financiado->getId();

        try {
            $sql = "DELETE FROM `informes_gestion_financiado` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Informes_gestion_financiado en la base de datos.
     * @return ArrayList<Informes_gestion_financiado> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `id_proyecto`, `grupo_investigacion`, `facultad`, `representante_facultad`, `duracion_proyecto`, `novedades_proyecto`, `conclusiones`, `observaciones`, `estado_solicitud`, `fecha_solicitud`"
                    . "FROM `informes_gestion_financiado`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $informes_gestion_financiado = new Informes_gestion_financiado();
                $informes_gestion_financiado->setId($data[$i]['id']);
                $informes_gestion_financiado->setId_proyecto($data[$i]['id_proyecto']);
                $informes_gestion_financiado->setGrupo_investigacion($data[$i]['grupo_investigacion']);
                $informes_gestion_financiado->setFacultad($data[$i]['facultad']);
                $informes_gestion_financiado->setRepresentante_facultad($data[$i]['representante_facultad']);
                $informes_gestion_financiado->setDuracion_proyecto($data[$i]['duracion_proyecto']);
                $informes_gestion_financiado->setNovedades_proyecto($data[$i]['novedades_proyecto']);
                $informes_gestion_financiado->setConclusiones($data[$i]['conclusiones']);
                $informes_gestion_financiado->setObservaciones($data[$i]['observaciones']);
                $informes_gestion_financiado->setEstado_solicitud($data[$i]['estado_solicitud']);
                $informes_gestion_financiado->setFecha_solicitud($data[$i]['fecha_solicitud']);

                array_push($lista, $informes_gestion_financiado);
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