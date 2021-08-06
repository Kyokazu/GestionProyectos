<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\

include_once realpath('../dao/interfaz/IUso_equiposDao.php');
include_once realpath('../dto/Uso_equipos.php');

class Uso_equiposDao implements IUso_equiposDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Uso_equipos en la base de datos.
     * @param uso_equipos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($uso_equipos) {

        $equipo = $uso_equipos->getEquipo();
        $proyecto = $uso_equipos->getProyecto();
        $otro_proyecto = $uso_equipos->getOtro_proyecto();
        $uso_posterior = $uso_equipos->getUso_posterior();
        $id_informe_gestion_financiado = $uso_equipos->getId_informe_gestion_financiado();

        try {
            $sql = "INSERT INTO `uso_equipos`( `equipo`, `proyecto`, `otro_proyecto`, `uso_posterior`, `id_informe_gestion_financiado`)"
                    . "VALUES ('$equipo','$proyecto','$otro_proyecto','$uso_posterior','$id_informe_gestion_financiado')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Uso_equipos en la base de datos.
     * @param uso_equipos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($uso_equipos) {
        $id = $uso_equipos->getId();

        try {
            $sql = "SELECT `id`, `equipo`, `proyecto`, `otro_proyecto`, `uso_posterior`, `id_informe_gestion_financiado`"
                    . "FROM `uso_equipos`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $uso_equipos->setId($data[$i]['id']);
                $uso_equipos->setEquipo($data[$i]['equipo']);
                $uso_equipos->setProyecto($data[$i]['proyecto']);
                $uso_equipos->setOtro_proyecto($data[$i]['otro_proyecto']);
                $uso_equipos->setUso_posterior($data[$i]['uso_posterior']);
                $uso_equipos->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);
            }
            return $uso_equipos;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Uso_equipos en la base de datos.
     * @param uso_equipos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($uso_equipos) {
        $id = $uso_equipos->getId();
        $equipo = $uso_equipos->getEquipo();
        $proyecto = $uso_equipos->getProyecto();
        $otro_proyecto = $uso_equipos->getOtro_proyecto();
        $uso_posterior = $uso_equipos->getUso_posterior();
        $id_informe_gestion_financiado = $uso_equipos->getId_informe_gestion_financiado();

        try {
            $sql = "UPDATE `uso_equipos` SET`id`='$id' ,`equipo`='$equipo' ,`proyecto`='$proyecto' ,`otro_proyecto`='$otro_proyecto' ,`uso_posterior`='$uso_posterior' ,`id_informe_gestion_financiado`='$id_informe_gestion_financiado' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Uso_equipos en la base de datos.
     * @param uso_equipos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($uso_equipos) {
        $id = $uso_equipos->getId();

        try {
            $sql = "DELETE FROM `uso_equipos` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Uso_equipos en la base de datos.
     * @return ArrayList<Uso_equipos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `equipo`, `proyecto`, `otro_proyecto`, `uso_posterior`, `id_informe_gestion_financiado`"
                    . "FROM `uso_equipos`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $uso_equipos = new Uso_equipos();
                $uso_equipos->setId($data[$i]['id']);
                $uso_equipos->setEquipo($data[$i]['equipo']);
                $uso_equipos->setProyecto($data[$i]['proyecto']);
                $uso_equipos->setOtro_proyecto($data[$i]['otro_proyecto']);
                $uso_equipos->setUso_posterior($data[$i]['uso_posterior']);
                $uso_equipos->setId_informe_gestion_financiado($data[$i]['id_informe_gestion_financiado']);

                array_push($lista, $uso_equipos);
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