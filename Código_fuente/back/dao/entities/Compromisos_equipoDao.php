<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\

include_once realpath('../dao/interfaz/ICompromisos_equipoDao.php');
include_once realpath('../dto/Compromisos_equipo.php');

class Compromisos_equipoDao implements ICompromisos_equipoDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Compromisos_equipo en la base de datos.
     * @param compromisos_equipo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($compromisos_equipo) {

        $estado_1 = $compromisos_equipo->getEstado_1();
        $cantidad_1 = $compromisos_equipo->getCantidad_1();
        $estado_2 = $compromisos_equipo->getEstado_2();
        $cantidad_2 = $compromisos_equipo->getCantidad_2();
        $estado_3 = $compromisos_equipo->getEstado_3();
        $cantidad_3 = $compromisos_equipo->getCantidad_3();
        $estado_4 = $compromisos_equipo->getEstado_4();
        $cantidad_4 = $compromisos_equipo->getCantidad_4();
        $estado_5 = $compromisos_equipo->getEstado_5();
        $cantidad_5 = $compromisos_equipo->getCantidad_5();
        $id_informe_gestion_financiado = $compromisos_equipo->getId_informe_gestion_financiado();

        try {
            $sql = "INSERT INTO `compromisos_equipo`( `estado_1`, `cantidad_1`, `estado_2`, `cantidad_2`, `estado_3`, `cantidad_3`, `estado_4`, `cantidad_4`, `estado_5`, `cantidad_5`, `id_informe_gestion_financiado`)"
                    . "VALUES ('$estado_1','$cantidad_1','$estado_2','$cantidad_2','$estado_3','$cantidad_3','$estado_4','$cantidad_4','$estado_5','$cantidad_5','$id_informe_gestion_financiado')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Compromisos_equipo en la base de datos.
     * @param compromisos_equipo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($compromisos_equipo) {
        $id = $compromisos_equipo->getId();

        try {
            $sql = "SELECT `id`, `estado_1`, `cantidad_1`, `estado_2`, `cantidad_2`, `estado_3`, `cantidad_3`, `estado_4`, `cantidad_4`, `estado_5`, `cantidad_5`, `id_informe_gestion_financiado`"
                    . "FROM `compromisos_equipo`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $compromisos_equipo->setId($data[$i]['id']);
                $compromisos_equipo->setEstado_1($data[$i]['estado_1']);
                $compromisos_equipo->setCantidad_1($data[$i]['cantidad_1']);
                $compromisos_equipo->setEstado_2($data[$i]['estado_2']);
                $compromisos_equipo->setCantidad_2($data[$i]['cantidad_2']);
                $compromisos_equipo->setEstado_3($data[$i]['estado_3']);
                $compromisos_equipo->setCantidad_3($data[$i]['cantidad_3']);
                $compromisos_equipo->setEstado_4($data[$i]['estado_4']);
                $compromisos_equipo->setCantidad_4($data[$i]['cantidad_4']);
                $compromisos_equipo->setEstado_5($data[$i]['estado_5']);
                $compromisos_equipo->setCantidad_5($data[$i]['cantidad_5']);
                $compromisos_equipo->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);
            }
            return $compromisos_equipo;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Compromisos_equipo en la base de datos.
     * @param compromisos_equipo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($compromisos_equipo) {
        $id = $compromisos_equipo->getId();
        $estado_1 = $compromisos_equipo->getEstado_1();
        $cantidad_1 = $compromisos_equipo->getCantidad_1();
        $estado_2 = $compromisos_equipo->getEstado_2();
        $cantidad_2 = $compromisos_equipo->getCantidad_2();
        $estado_3 = $compromisos_equipo->getEstado_3();
        $cantidad_3 = $compromisos_equipo->getCantidad_3();
        $estado_4 = $compromisos_equipo->getEstado_4();
        $cantidad_4 = $compromisos_equipo->getCantidad_4();
        $estado_5 = $compromisos_equipo->getEstado_5();
        $cantidad_5 = $compromisos_equipo->getCantidad_5();
        $id_informe_gestion_financiado = $compromisos_equipo->getId_informe_gestion_financiado();

        try {
            $sql = "UPDATE `compromisos_equipo` SET`id`='$id' ,`estado_1`='$estado_1' ,`cantidad_1`='$cantidad_1' ,`estado_2`='$estado_2' ,`cantidad_2`='$cantidad_2' ,`estado_3`='$estado_3' ,`cantidad_3`='$cantidad_3' ,`estado_4`='$estado_4' ,`cantidad_4`='$cantidad_4' ,`estado_5`='$estado_5' ,`cantidad_5`='$cantidad_5' ,`id_informe_gestion_financiado`='$id_informe_gestion_financiado' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Compromisos_equipo en la base de datos.
     * @param compromisos_equipo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($compromisos_equipo) {
        $id = $compromisos_equipo->getId();

        try {
            $sql = "DELETE FROM `compromisos_equipo` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Compromisos_equipo en la base de datos.
     * @return ArrayList<Compromisos_equipo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `estado_1`, `cantidad_1`, `estado_2`, `cantidad_2`, `estado_3`, `cantidad_3`, `estado_4`, `cantidad_4`, `estado_5`, `cantidad_5`, `id_informe_gestion_financiado`"
                    . "FROM `compromisos_equipo`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $compromisos_equipo = new Compromisos_equipo();
                $compromisos_equipo->setId($data[$i]['id']);
                $compromisos_equipo->setEstado_1($data[$i]['estado_1']);
                $compromisos_equipo->setCantidad_1($data[$i]['cantidad_1']);
                $compromisos_equipo->setEstado_2($data[$i]['estado_2']);
                $compromisos_equipo->setCantidad_2($data[$i]['cantidad_2']);
                $compromisos_equipo->setEstado_3($data[$i]['estado_3']);
                $compromisos_equipo->setCantidad_3($data[$i]['cantidad_3']);
                $compromisos_equipo->setEstado_4($data[$i]['estado_4']);
                $compromisos_equipo->setCantidad_4($data[$i]['cantidad_4']);
                $compromisos_equipo->setEstado_5($data[$i]['estado_5']);
                $compromisos_equipo->setCantidad_5($data[$i]['cantidad_5']);
                $compromisos_equipo->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);

                array_push($lista, $compromisos_equipo);
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