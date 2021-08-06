<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    ¿Has escuchado hablar del grandioso señor Arciniegas?  \\

include_once realpath('../dao/interfaz/IImpactos_socialesDao.php');
include_once realpath('../dto/Impactos_sociales.php');

class Impactos_socialesDao implements IImpactos_socialesDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Impactos_sociales en la base de datos.
     * @param impactos_sociales objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($impactos_sociales) {

        $impacto_1 = $impactos_sociales->getImpacto_1();
        $impacto_2 = $impactos_sociales->getImpacto_2();
        $impacto_3 = $impactos_sociales->getImpacto_3();
        $impacto_4 = $impactos_sociales->getImpacto_4();
        $impacto_5 = $impactos_sociales->getImpacto_5();
        $impacto_6 = $impactos_sociales->getImpacto_6();
        $impacto_7 = $impactos_sociales->getImpacto_7();
        $id_informe_gestion_financiado = $impactos_sociales->getId_informe_gestion_financiado();

        try {
            $sql = "INSERT INTO `impactos_sociales`( `impacto_1`, `impacto_2`, `impacto_3`, `impacto_4`, `impacto_5`, `impacto_6`, `impacto_7`, `id_informe_gestion_financiado`)"
                    . "VALUES ('$impacto_1','$impacto_2','$impacto_3','$impacto_4','$impacto_5','$impacto_6','$impacto_7','$id_informe_gestion_financiado')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Impactos_sociales en la base de datos.
     * @param impactos_sociales objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($impactos_sociales) {
        $id = $impactos_sociales->getId();

        try {
            $sql = "SELECT `id`, `impacto_1`, `impacto_2`, `impacto_3`, `impacto_4`, `impacto_5`, `impacto_6`, `impacto_7`, `id_informe_gestion_financiado`"
                    . "FROM `impactos_sociales`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $impactos_sociales->setId($data[$i]['id']);
                $impactos_sociales->setImpacto_1($data[$i]['impacto_1']);
                $impactos_sociales->setImpacto_2($data[$i]['impacto_2']);
                $impactos_sociales->setImpacto_3($data[$i]['impacto_3']);
                $impactos_sociales->setImpacto_4($data[$i]['impacto_4']);
                $impactos_sociales->setImpacto_5($data[$i]['impacto_5']);
                $impactos_sociales->setImpacto_6($data[$i]['impacto_6']);
                $impactos_sociales->setImpacto_7($data[$i]['impacto_7']);
                $impactos_sociales->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);
            }
            return $impactos_sociales;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Impactos_sociales en la base de datos.
     * @param impactos_sociales objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($impactos_sociales) {
        $id = $impactos_sociales->getId();
        $impacto_1 = $impactos_sociales->getImpacto_1();
        $impacto_2 = $impactos_sociales->getImpacto_2();
        $impacto_3 = $impactos_sociales->getImpacto_3();
        $impacto_4 = $impactos_sociales->getImpacto_4();
        $impacto_5 = $impactos_sociales->getImpacto_5();
        $impacto_6 = $impactos_sociales->getImpacto_6();
        $impacto_7 = $impactos_sociales->getImpacto_7();
        $id_informe_gestion_financiado = $impactos_sociales->getId_informe_gestion_financiado();

        try {
            $sql = "UPDATE `impactos_sociales` SET`id`='$id' ,`impacto_1`='$impacto_1' ,`impacto_2`='$impacto_2' ,`impacto_3`='$impacto_3' ,`impacto_4`='$impacto_4' ,`impacto_5`='$impacto_5' ,`impacto_6`='$impacto_6' ,`impacto_7`='$impacto_7' ,`id_informe_gestion_financiado`='$id_informe_gestion_financiado' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Impactos_sociales en la base de datos.
     * @param impactos_sociales objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($impactos_sociales) {
        $id = $impactos_sociales->getId();

        try {
            $sql = "DELETE FROM `impactos_sociales` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Impactos_sociales en la base de datos.
     * @return ArrayList<Impactos_sociales> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `impacto_1`, `impacto_2`, `impacto_3`, `impacto_4`, `impacto_5`, `impacto_6`, `impacto_7`, `id_informe_gestion_financiado`"
                    . "FROM `impactos_sociales`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $impactos_sociales = new Impactos_sociales();
                $impactos_sociales->setId($data[$i]['id']);
                $impactos_sociales->setImpacto_1($data[$i]['impacto_1']);
                $impactos_sociales->setImpacto_2($data[$i]['impacto_2']);
                $impactos_sociales->setImpacto_3($data[$i]['impacto_3']);
                $impactos_sociales->setImpacto_4($data[$i]['impacto_4']);
                $impactos_sociales->setImpacto_5($data[$i]['impacto_5']);
                $impactos_sociales->setImpacto_6($data[$i]['impacto_6']);
                $impactos_sociales->setImpacto_7($data[$i]['impacto_7']);
                $impactos_sociales->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);

                array_push($lista, $impactos_sociales);
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