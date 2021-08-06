<?php

include_once realpath('../dao/interfaz/IContratoDao.php');
include_once realpath('../dto/Contrato.php');

class ContratoDao implements IContratoDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Contrato en la base de datos.
     * @param contrato objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($contrato) {
        $id = $contrato->getId();
        $numero_contrato = $contrato->getNumero_contrato();
        $acta_comite = $contrato->getActa_comite();
        $valor_financiado = $contrato->getValor_financiado();
        $fecha_inicio = $contrato->getFecha_inicio();
        $fecha_suspension = $contrato->getFecha_suspension();
        $fecha_reinicio = $contrato->getFecha_reinicio();
        $prorroga = $contrato->getProrroga();
        $fecha_terminacion = $contrato->getFecha_terminacion();
        $tiempo_ejecucion = $contrato->getTiempo_ejecucion();
        $id_informe_gestion_financiado = $contrato->getId_informe_gestion_financiado();
        
        try {
            $sql = "INSERT INTO `contrato`(`numero_contrato`, `acta_comite`, `valor_financiado`, `fecha_inicio`, `fecha_suspension`, `fecha_reinicio`, `prorroga`, `fecha_terminacion`, `tiempo_ejecucion`, `id_informe_gestion_financiado`)"
                    . "VALUES ('$numero_contrato','$acta_comite','$valor_financiado','$fecha_inicio','$fecha_suspension','$fecha_reinicio','$prorroga','$fecha_terminacion','$tiempo_ejecucion','$id_informe_gestion_financiado')";

            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function insert2($contrato) {

        $numero_contrato = $contrato->getNumero_contrato();
        $fecha_inicio = $contrato->getFecha_inicio();
        $fecha_terminacion = $contrato->getFecha_terminacion();

        try {
            $sql = "INSERT INTO `contrato`( `numero_contrato`, `fecha_inicio`, `fecha_terminacion`)"
                    . "VALUES ('$numero_contrato','$fecha_inicio','$fecha_terminacion')";

            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Contrato en la base de datos.
     * @param contrato objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($contrato) {
        $id = $contrato->getId();

        try {
            $sql = "SELECT `id`, `numero_contrato`, `acta_comite`, `valor_financiado`, `fecha_inicio`, `fecha_suspension`, `fecha_reinicio`, `prorroga`, `fecha_terminacion`, `tiempo_ejecucion`, `id_informe_gestion_financiado`"
                    . "FROM `contrato`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $contrato->setId($data[$i]['id']);
                $contrato->setNumero_contrato($data[$i]['numero_contrato']);
                $contrato->setActa_comite($data[$i]['acta_comite']);
                $contrato->setValor_financiado($data[$i]['valor_financiado']);
                $contrato->setFecha_inicio($data[$i]['fecha_inicio']);
                $contrato->setFecha_suspension($data[$i]['fecha_suspension']);
                $contrato->setFecha_reinicio($data[$i]['fecha_reinicio']);
                $contrato->setProrroga($data[$i]['prorroga']);
                $contrato->setFecha_terminacion($data[$i]['fecha_terminacion']);
                $contrato->setTiempo_ejecucion($data[$i]['tiempo_ejecucion']);
                $contrato->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);
            }
            return $contrato;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Contrato en la base de datos.
     * @param contrato objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($contrato) {
        $id = $contrato->getId();
        $numero_contrato = $contrato->getNumero_contrato();
        $acta_comite = $contrato->getActa_comite();
        $valor_financiado = $contrato->getValor_financiado();
        $fecha_inicio = $contrato->getFecha_inicio();
        $fecha_suspension = $contrato->getFecha_suspension();
        $fecha_reinicio = $contrato->getFecha_reinicio();
        $prorroga = $contrato->getProrroga();
        $fecha_terminacion = $contrato->getFecha_terminacion();
        $tiempo_ejecucion = $contrato->getTiempo_ejecucion();
        $id_informe_gestion_financiado = $contrato->getId_informe_gestion_financiado();

        try {
            $sql = "UPDATE `contrato` SET`id`='$id' ,`numero_contrato`='$numero_contrato' ,`acta_comite`='$acta_comite' ,`valor_financiado`='$valor_financiado' ,`fecha_inicio`='$fecha_inicio' ,`fecha_suspension`='$fecha_suspension' ,`fecha_reinicio`='$fecha_reinicio' ,`prorroga`='$prorroga' ,`fecha_terminacion`='$fecha_terminacion' ,`tiempo_ejecucion`='$tiempo_ejecucion' ,`id_informe_gestion_financiado`='$id_informe_gestion_financiado' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Contrato en la base de datos.
     * @param contrato objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($contrato) {
        $id = $contrato->getId();

        try {
            $sql = "DELETE FROM `contrato` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Contrato en la base de datos.
     * @return ArrayList<Contrato> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `numero_contrato`, `acta_comite`, `valor_financiado`, `fecha_inicio`, `fecha_suspension`, `fecha_reinicio`, `prorroga`, `fecha_terminacion`, `tiempo_ejecucion`, `id_informe_gestion_financiado`"
                    . "FROM `contrato`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $contrato = new Contrato();
                $contrato->setId($data[$i]['id']);
                $contrato->setNumero_contrato($data[$i]['numero_contrato']);
                $contrato->setActa_comite($data[$i]['acta_comite']);
                $contrato->setValor_financiado($data[$i]['valor_financiado']);
                $contrato->setFecha_inicio($data[$i]['fecha_inicio']);
                $contrato->setFecha_suspension($data[$i]['fecha_suspension']);
                $contrato->setFecha_reinicio($data[$i]['fecha_reinicio']);
                $contrato->setProrroga($data[$i]['prorroga']);
                $contrato->setFecha_terminacion($data[$i]['fecha_terminacion']);
                $contrato->setTiempo_ejecucion($data[$i]['tiempo_ejecucion']);
                $contrato->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);

                array_push($lista, $contrato);
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