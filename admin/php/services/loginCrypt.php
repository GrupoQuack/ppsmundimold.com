<?php
// Incluir la clase de base de datos
include_once("../classes/class.Database.php");

$postdata = file_get_contents("php://input");

$request = json_decode($postdata);
$request =  (array) $request;

$sql = "SELECT * FROM user WHERE username = '" . $request['username'] . "'";

$found = Database::get_json_row($sql);


if( json_encode($found) === '"{}"' ){
	echo json_encode( array('err' => TRUE , 'mensaje'=>'El Nombre de Usuario o Contraseña son incorrectos.') );
}else{
	$arreglo = (array)json_decode($found);
	if( Database::uncrypt($request['password'], $arreglo['password'] ) ){
		echo json_encode( array('err' => FALSE , 'mensaje'=>'' ));
	}else{
		echo json_encode( array('err' => TRUE , 'mensaje'=>'El Nombre de Usuario o Contraseña son incorrectos.') );
	}
}
?>