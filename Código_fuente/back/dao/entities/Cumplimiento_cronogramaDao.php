<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\

include_once realpath('../dao/interfaz/ICumplimiento_cronogramaDao.php');
include_once realpath('../dto/Cumplimiento_cronograma.php');

class Cumplimiento_cronogramaDao implements ICumplimiento_cronogramaDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Cumplimiento_cronograma en la base de datos.
     * @param cumplimiento_cronograma objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($cumplimiento_cronograma) {

        $objetivo = $cumplimiento_cronograma->getObjetivo();
        $actividades = $cumplimiento_cronograma->getActividades();
        $estado = $cumplimiento_cronograma->getEstado();
        $semestre = $cumplimiento_cronograma->getSemestre();
        $id_informe_gestion_financiado = $cumplimiento_cronograma->getId_informe_gestion_financiado();

        try {
            $sql = "INSERT INTO `cumplimiento_cronograma`( `objetivo`, `actividades`, `estado`, `semestre`, `id_informe_gestion_financiado`)"
                    . "VALUES ('$objetivo','$actividades','$estado','$semestre','$id_informe_gestion_financiado')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Cumplimiento_cronograma en la base de datos.
     * @param cumplimiento_cronograma objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($cumplimiento_cronograma) {
        $id = $cumplimiento_cronograma->getId();

        try {
            $sql = "SELECT `id`, `objetivo`, `actividades`, `estado`, `semestre`, `id_informe_gestion_financiado`"
                    . "FROM `cumplimiento_cronograma`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $cumplimiento_cronograma->setId($data[$i]['id']);
                $cumplimiento_cronograma->setObjetivo($data[$i]['objetivo']);
                $cumplimiento_cronograma->setActividades($data[$i]['actividades']);
                $cumplimiento_cronograma->setEstado($data[$i]['estado']);
                $cumplimiento_cronograma->setSemestre($data[$i]['semestre']);
                $cumplimiento_cronograma->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);
            }
            return $cumplimiento_cronograma;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Cumplimiento_cronograma en la base de datos.
     * @param cumplimiento_cronograma objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($cumplimiento_cronograma) {
        $id = $cumplimiento_cronograma->getId();
        $objetivo = $cumplimiento_cronograma->getObjetivo();
        $actividades = $cumplimiento_cronograma->getActividades();
        $estado = $cumplimiento_cronograma->getEstado();
        $semestre = $cumplimiento_cronograma->getSemestre();
        $id_informe_gestion_financiado = $cumplimiento_cronograma->getId_informe_gestion_financiado();

        try {
            $sql = "UPDATE `cumplimiento_cronograma` SET`id`='$id' ,`objetivo`='$objetivo' ,`actividades`='$actividades' ,`estado`='$estado' ,`semestre`='$semestre' ,`id_informe_gestion_financiado`='$id_informe_gestion_financiado' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Cumplimiento_cronograma en la base de datos.
     * @param cumplimiento_cronograma objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($cumplimiento_cronograma) {
        $id = $cumplimiento_cronograma->getId();

        try {
            $sql = "DELETE FROM `cumplimiento_cronograma` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Cumplimiento_cronograma en la base de datos.
     * @return ArrayList<Cumplimiento_cronograma> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `objetivo`, `actividades`, `estado`, `semestre`, `id_informe_gestion_financiado`"
                    . "FROM `cumplimiento_cronograma`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $cumplimiento_cronograma = new Cumplimiento_cronograma();
                $cumplimiento_cronograma->setId($data[$i]['id']);
                $cumplimiento_cronograma->setObjetivo($data[$i]['objetivo']);
                $cumplimiento_cronograma->setActividades($data[$i]['actividades']);
                $cumplimiento_cronograma->setEstado($data[$i]['estado']);
                $cumplimiento_cronograma->setSemestre($data[$i]['semestre']);
                $cumplimiento_cronograma->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);

                array_push($lista, $cumplimiento_cronograma);
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