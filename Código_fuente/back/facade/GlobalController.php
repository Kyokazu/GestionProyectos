<?php

require_once realpath('../dao/factory/FactoryDao.php');

/**
 * Para su comodidad, defina aquÃ­ el gestor de conexiÃ³n predilecto para su proyecto
 */
define("DEFAULT_GESTOR", FactoryDao::$MYSQL_FACTORY);
/**
 * Para su comodidad, defina aquÃ­ el nombre de base de datos predilecto para su proyecto
 */
//define("DEFAULT_DBNAME", "sistema");
define("DEFAULT_DBNAME", "semillero");

