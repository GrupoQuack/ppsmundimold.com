<?php
    include_once("../classes/class.Database.php");
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $request =  (array) $request;
    $filepath = "../../img/casos/" . $request['Nombre'] . "." . $request['Type'];
    $archivo = base64_decode($request['fileBody']);
    $Respuesta = "";
    
    $sql = "UPDATE caso SET ";

    foreach ($request as $clave => $valor) {
        if($clave != 'fileName' && $clave != 'fileBody' && $clave != 'fileSize' && $clave != "Id"){
            if($clave == 'Posicion'){
                $sql = $sql . " " . $clave . " = " . $valor . ", ";
            }else if($clave == 'Visible'){
                if($valor == 1){
                    $sql = $sql . " " . $clave . " = " . 1 . ", ";
                }else{
                    $sql = $sql . " " . $clave . " = " . 0 . ", ";
                }
            }else{
                $sql = $sql . " " . $clave . " = '" . $valor . "', ";
            }
        }
    }

    $sql = $sql . "WHERE Id = " . $request['Id'];
    $sql = str_replace ( ", WHERE" , " WHERE" , $sql );

    if($request['fileBody'] != null && $request['fileName'] != null && $request['fileSize'] != null){
        $sqlTemp = "SELECT * FROM caso WHERE Id = " . $request['Id'];
        $Resp = Database::get_Row($sqlTemp);
        $filepathTemp = "../../img/casos/" . $Resp['Nombre'] . "." . $Resp['Type'];
        if(file_exists ( $filepathTemp ) ){
            unlink($filepathTemp);
        }
    }
    
    $Hecho = Database::ejecutar_idu($sql);
    
    if ($Hecho == "1") {
        if($request['fileBody'] != null && $request['fileName'] != null && $request['fileSize'] != null){
            if(file_put_contents($filepath, $archivo)){
                $Respuesta = json_encode( array('error' => false, 'mensaje'=> 'Registro actualizado exitosamente.' ));
            }else{
                $Respuesta = json_encode( array('error' => true, 'mensaje'=> 'Error al cargar la imagen' ));
            }
        }else{
            $Respuesta = json_encode( array('error' => false, 'mensaje'=>'Registro actualizado exitosamente.' )); 
        }
    }else{
        $Respuesta = json_encode( array('error' => true, 'mensaje'=> $Hecho ));
    }
    
    // $Respuesta = json_encode( array('error' => true, 'mensaje'=> $sql ));

    echo $Respuesta;
?>