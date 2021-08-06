<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Caminante no hay camino, se hace camino al andar  \\

include_once realpath('../dao/interfaz/ICumplimiento_objetivosDao.php');
include_once realpath('../dto/Cumplimiento_objetivos.php');

class Cumplimiento_objetivosDao implements ICumplimiento_objetivosDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Cumplimiento_objetivos en la base de datos.
     * @param cumplimiento_objetivos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($cumplimiento_objetivos) {

        $objetivos_propuestos = $cumplimiento_objetivos->getObjetivos_propuestos();
        $actividades_propuestas = $cumplimiento_objetivos->getActividades_propuestas();
        $actividades_desarrolladas = $cumplimiento_objetivos->getActividades_desarrolladas();
        $logros_alcanzados = $cumplimiento_objetivos->getLogros_alcanzados();
        $porcentaje_cumplimiento = $cumplimiento_objetivos->getPorcentaje_cumplimiento();
        $id_informe_gestion_financiado = $cumplimiento_objetivos->getId_informe_gestion_financiado();

        try {
            $sql = "INSERT INTO `cumplimiento_objetivos`( `objetivos_propuestos`, `actividades_propuestas`, `actividades_desarrolladas`, `logros_alcanzados`, `porcentaje_cumplimiento`, `id_informe_gestion_financiado`)"
                    . "VALUES ('$objetivos_propuestos','$actividades_propuestas','$actividades_desarrolladas','$logros_alcanzados','$porcentaje_cumplimiento','$id_informe_gestion_financiado')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Cumplimiento_objetivos en la base de datos.
     * @param cumplimiento_objetivos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($cumplimiento_objetivos) {
        $id = $cumplimiento_objetivos->getId();

        try {
            $sql = "SELECT `id`, `objetivos_propuestos`, `actividades_propuestas`, `actividades_desarrolladas`, `logros_alcanzados`, `porcentaje_cumplimiento`, `cumplimiento_objetivoscol`, `id_informe_gestion_financiado`"
                    . "FROM `cumplimiento_objetivos`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $cumplimiento_objetivos->setId($data[$i]['id']);
                $cumplimiento_objetivos->setObjetivos_propuestos($data[$i]['objetivos_propuestos']);
                $cumplimiento_objetivos->setActividades_propuestas($data[$i]['actividades_propuestas']);
                $cumplimiento_objetivos->setActividades_desarrolladas($data[$i]['actividades_desarrolladas']);
                $cumplimiento_objetivos->setLogros_alcanzados($data[$i]['logros_alcanzados']);
                $cumplimiento_objetivos->setPorcentaje_cumplimiento($data[$i]['porcentaje_cumplimiento']);
                $cumplimiento_objetivos->setCumplimiento_objetivoscol($data[$i]['cumplimiento_objetivoscol']);
                $cumplimiento_objetivos->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);
            }
            return $cumplimiento_objetivos;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Cumplimiento_objetivos en la base de datos.
     * @param cumplimiento_objetivos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($cumplimiento_objetivos) {
        $id = $cumplimiento_objetivos->getId();
        $objetivos_propuestos = $cumplimiento_objetivos->getObjetivos_propuestos();
        $actividades_propuestas = $cumplimiento_objetivos->getActividades_propuestas();
        $actividades_desarrolladas = $cumplimiento_objetivos->getActividades_desarrolladas();
        $logros_alcanzados = $cumplimiento_objetivos->getLogros_alcanzados();
        $porcentaje_cumplimiento = $cumplimiento_objetivos->getPorcentaje_cumplimiento();
        $cumplimiento_objetivoscol = $cumplimiento_objetivos->getCumplimiento_objetivoscol();
        $id_informe_gestion_financiado = $cumplimiento_objetivos->getId_informe_gestion_financiado();

        try {
            $sql = "UPDATE `cumplimiento_objetivos` SET`id`='$id' ,`objetivos_propuestos`='$objetivos_propuestos' ,`actividades_propuestas`='$actividades_propuestas' ,`actividades_desarrolladas`='$actividades_desarrolladas' ,`logros_alcanzados`='$logros_alcanzados' ,`porcentaje_cumplimiento`='$porcentaje_cumplimiento' ,`cumplimiento_objetivoscol`='$cumplimiento_objetivoscol' ,`id_informe_gestion_financiado`='$id_informe_gestion_financiado' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Cumplimiento_objetivos en la base de datos.
     * @param cumplimiento_objetivos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($cumplimiento_objetivos) {
        $id = $cumplimiento_objetivos->getId();

        try {
            $sql = "DELETE FROM `cumplimiento_objetivos` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Cumplimiento_objetivos en la base de datos.
     * @return ArrayList<Cumplimiento_objetivos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `objetivos_propuestos`, `actividades_propuestas`, `actividades_desarrolladas`, `logros_alcanzados`, `porcentaje_cumplimiento`, `id_informe_gestion_financiado`"
                    . "FROM `cumplimiento_objetivos`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $cumplimiento_objetivos = new Cumplimiento_objetivos();
                $cumplimiento_objetivos->setId($data[$i]['id']);
                $cumplimiento_objetivos->setObjetivos_propuestos($data[$i]['objetivos_propuestos']);
                $cumplimiento_objetivos->setActividades_propuestas($data[$i]['actividades_propuestas']);
                $cumplimiento_objetivos->setActividades_desarrolladas($data[$i]['actividades_desarrolladas']);
                $cumplimiento_objetivos->setLogros_alcanzados($data[$i]['logros_alcanzados']);
                $cumplimiento_objetivos->setPorcentaje_cumplimiento($data[$i]['porcentaje_cumplimiento']);
                $cumplimiento_objetivos->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);

                array_push($lista, $cumplimiento_objetivos);
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