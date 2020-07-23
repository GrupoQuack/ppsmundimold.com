<?php
    include_once("../classes/class.Database.php");
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $request =  (array) $request;
    $filepath = "../../img/casos/" . $request['Nombre'] . "." . $request['Type'];
    $archivo = base64_decode($request['fileBody']);
    $Respuesta = "";

    $sql = "INSERT INTO caso(Titulo, Descripcion, Nombre, URL, Type, Visible, Posicion) 
		        VALUES ( '". $request['Titulo'] ."',
                        '".$request['Descripcion']."',
                        '".$request['Nombre']."',
                        '".$request['URL']."',
                        '".$request['Type']."',
                        '".$request['Visible']."',
                        '".$request['Posicion']."' )";
        
    $Hecho = Database::ejecutar_idu($sql);
    
    if ($Hecho == "1") {
        if(file_put_contents($filepath, $archivo)){
            $Respuesta = json_encode( array('error' => false, 'mensaje'=>'Registro creado exitosamente.' ));
        }else{
            $Respuesta = json_encode( array('error' => true, 'mensaje'=> 'Error al cargar la imagen' ));
        }
    }else{
        $Respuesta = json_encode( array('error' => true, 'mensaje'=> $Hecho ));
    }

    echo $Respuesta;
?>