<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\

include_once realpath('../dao/interfaz/IActividades_jovenesDao.php');
include_once realpath('../dto/Actividades_jovenes.php');

class Actividades_jovenesDao implements IActividades_jovenesDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Actividades_jovenes en la base de datos.
     * @param actividades_jovenes objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($actividades_jovenes) {

        $actividades_desarrolladas = $actividades_jovenes->getActividades_desarrolladas();
        $productos_alcanzados = $actividades_jovenes->getProductos_alcanzados();
        $semestre = $actividades_jovenes->getSemestre();
        $id_informe_gestion_jovenes = $actividades_jovenes->getId_informe_gestion_jovenes();

        try {
            $sql = "INSERT INTO `actividades_jovenes`( `actividades_desarrolladas`, `productos_alcanzados`, `semestre`, `id_informe_gestion_jovenes`)"
                    . "VALUES ('$actividades_desarrolladas','$productos_alcanzados','$semestre','$id_informe_gestion_jovenes')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Actividades_jovenes en la base de datos.
     * @param actividades_jovenes objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($actividades_jovenes) {
        $id = $actividades_jovenes->getId();

        try {
            $sql = "SELECT `id`, `actividades_desarrolladas`, `productos_alcanzados`, `semestre`, `id_informe_gestion_jovenes`"
                    . "FROM `actividades_jovenes`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $actividades_jovenes->setId($data[$i]['id']);
                $actividades_jovenes->setActividades_desarrolladas($data[$i]['actividades_desarrolladas']);
                $actividades_jovenes->setProductos_alcanzados($data[$i]['productos_alcanzados']);
                $actividades_jovenes->setSemestre($data[$i]['semestre']);
                $actividades_jovenes->setId_informe_gestion_jovenes($data[$i]['id_informe_gestion_jovenes']);
            }
            return $actividades_jovenes;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Actividades_jovenes en la base de datos.
     * @param actividades_jovenes objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($actividades_jovenes) {
        $id = $actividades_jovenes->getId();
        $actividades_desarrolladas = $actividades_jovenes->getActividades_desarrolladas();
        $productos_alcanzados = $actividades_jovenes->getProductos_alcanzados();
        $semestre = $actividades_jovenes->getSemestre();
        $id_informe_gestion_jovenes = $actividades_jovenes->getId_informe_gestion_jovenes();

        try {
            $sql = "UPDATE `actividades_jovenes` SET`id`='$id' ,`actividades_desarrolladas`='$actividades_desarrolladas' ,`productos_alcanzados`='$productos_alcanzados' ,`semestre`='$semestre' ,`id_informe_gestion_jovenes`='$id_informe_gestion_jovenes' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Actividades_jovenes en la base de datos.
     * @param actividades_jovenes objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($actividades_jovenes) {
        $id = $actividades_jovenes->getId();

        try {
            $sql = "DELETE FROM `actividades_jovenes` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Actividades_jovenes en la base de datos.
     * @return ArrayList<Actividades_jovenes> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `actividades_desarrolladas`, `productos_alcanzados`, `semestre`, `id_informe_gestion_jovenes`"
                    . "FROM `actividades_jovenes`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $actividades_jovenes = new Actividades_jovenes();
                $actividades_jovenes->setId($data[$i]['id']);
                $actividades_jovenes->setActividades_desarrolladas($data[$i]['actividades_desarrolladas']);
                $actividades_jovenes->setProductos_alcanzados($data[$i]['productos_alcanzados']);
                $actividades_jovenes->setSemestre($data[$i]['semestre']);
                $actividades_jovenes->setId_informe_gestion_jovenes($data[$i]['id_informe_gestion_jovenes']);

                array_push($lista, $actividades_jovenes);
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