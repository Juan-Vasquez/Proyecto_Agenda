<?php

	session_start();
	$conexion = new mysqli('localhost', 'root', '1234', 'agenda');

	if($conexion->connect_error){
		die('Error: '.$conexion->connect_error);
	} 

	if(isset($_SESSION['idUsuarios'])){
		$id = $_POST['id'];

		$sqlactualizar = 'UPDATE eventos SET fechaInicio="'.$_POST['start_date'].'", fechaFinalizacion="'.$_POST['end_date'].'", horaInicio="'.$_POST['start_hour'].'", horaFinalizacion="'.$_POST['end_hour'].'" WHERE idEventos='.$id.';';
		$consulta = $conexion->query($sqlactualizar);

		if(!$consulta){
			$respuesta['msg'] = "No se actualizaron los datos";
		}else{
			$respuesta['msg'] = "OK";
		}

	}

	$conexion->close();
	echo json_encode($respuesta);


 ?>
