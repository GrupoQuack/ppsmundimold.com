<?php
    include_once("../classes/class.Database.php");
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $request =  (array) $request;
    $Respuesta = "";

    $sql = "DELETE FROM caso WHERE Id ='" . $request['Id'] . "'";
        
    $Hecho = Database::ejecutar_idu($sql);
        
    if ($Hecho == "1") {
        $filepath = "../../img/casos/" . $request['Nombre'] . "." . $request['Type'];
        unlink($filepath);
        $Respuesta = json_encode( array('error' => false, 'mensaje'=>'Registro eliminado exitosamente.' ));
    }else{
        $Respuesta = json_encode( array('error' => true, 'mensaje'=> $Hecho ));
    }

    echo $Respuesta;
?>