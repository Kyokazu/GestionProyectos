<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\
include_once realpath('../facade/Tipo_publicacionesFacade.php');


    $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id = strip_tags($dataObject->id);

    
$rpta = Tipo_publicacionesFacade::update_Delete($id);
       
    try {
       if ($rpta > 0) {
            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
    }

  
