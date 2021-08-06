<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Ella existió sólo en un sueño. Él es un poema que el poeta nunca escribió.  \\

include_once realpath('../dao/interfaz/IInvestigadorDao.php');
include_once realpath('../dto/Investigador.php');

class InvestigadorDao implements IInvestigadorDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Investigador en la base de datos.
     * @param investigador objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($investigador) {
        $id = $investigador->getId();
        $tipo_investigador = $investigador->getTipo_investigador();
        $horas_semana = $investigador->getHoras_semana();
        $id_solicitud_horas_financiado = $investigador->getId_solicitud_horas_financiado();
        $id_informe_gestion_financiado = $investigador->getId_informe_gestion_financiado();

        try {
            $sql = "INSERT INTO `investigador`( `id`, `tipo_investigador`, `horas_semana`, `id_solicitud_horas_financiado`, `id_informe_gestion_financiado`)"
                    . "VALUES ('$id','$tipo_investigador','$horas_semana','$id_solicitud_horas_financiado','$id_informe_gestion_financiado')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function insert2($investigador) {

        $nombre_investigador = $investigador->getNombre_investigador();
        $horas_semana = $investigador->getHoras_semana();
        $tipo_investigador = $investigador->getTipo_investigador();
        $id_solicitud_horas_financiado = $investigador->getId_solicitud_horas_financiado();


        try {
            $sql = "INSERT INTO `investigador`(`nombre_investigador`,`horas_semana`,`tipo_investigador`,`id_solicitud_horas_financiado`)"
                    . "VALUES ('$nombre_investigador','$horas_semana','$tipo_investigador','$id_solicitud_horas_financiado')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function insert3($investigador) {

        $nombre_investigador = $investigador->getNombre_investigador();
        $horas_semana = $investigador->getHoras_semana();
        $tipo_investigador = $investigador->getTipo_investigador();
        $id_informe_gestion_financiado = $investigador->getId_informe_gestion_financiado();


        try {
            $sql = "INSERT INTO `investigador`(`nombre_investigador`,`horas_semana`,`tipo_investigador`,`id_informe_gestion_financiado`)"
                    . "VALUES ('$nombre_investigador','$horas_semana','$tipo_investigador','$id_informe_gestion_financiado')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Investigador en la base de datos.
     * @param investigador objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($investigador) {
        $id = $investigador->getId();

        try {
            $sql = "SELECT `id`, `tipo_investigador`, `horas_semana`, `id_solicitud_horas_financiado`, `id_informe_gestion_financiado`"
                    . "FROM `investigador`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $investigador->setId($data[$i]['id']);
                $investigador->setTipo_investigador($data[$i]['tipo_investigador']);
                $investigador->setHoras_semana($data[$i]['horas_semana']);
                $investigador->setId_solicitud_horas_financiado($data[$i]['id_solicitud_horas_financiado']);
                $investigador->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);
            }
            return $investigador;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Investigador en la base de datos.
     * @param investigador objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($investigador) {
        $id = $investigador->getId();
        $tipo_investigador = $investigador->getTipo_investigador();
        $horas_semana = $investigador->getHoras_semana();
        $id_solicitud_horas_financiado = $investigador->getId_solicitud_horas_financiado();
        $id_informe_gestion_financiado = $investigador->getId_informe_gestion_financiado();

        try {
            $sql = "UPDATE `investigador` SET`id`='$id' ,`tipo_investigador`='$tipo_investigador' ,`horas_semana`='$horas_semana' ,`id_solicitud_horas_financiado`='$id_solicitud_horas_financiado' ,`id_informe_gestion_financiado`='$id_informe_gestion_financiado' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Investigador en la base de datos.
     * @param investigador objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($investigador) {
        $id = $investigador->getId();

        try {
            $sql = "DELETE FROM `investigador` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Investigador en la base de datos.
     * @return ArrayList<Investigador> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`,`nombre_investigador`, `tipo_investigador`, `horas_semana`, `id_solicitud_horas_financiado`, `id_informe_gestion_financiado`"
                    . "FROM `investigador`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $investigador = new Investigador();
                $investigador->setId($data[$i]['id']);
                $investigador->setNombre_investigador($data[$i]['nombre_investigador']);
                $investigador->setTipo_investigador($data[$i]['tipo_investigador']);
                $investigador->setHoras_semana($data[$i]['horas_semana']);
                $investigador->setId_solicitud_horas_financiado($data[$i]['id_solicitud_horas_financiado']);
                $investigador->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);

                array_push($lista, $investigador);
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