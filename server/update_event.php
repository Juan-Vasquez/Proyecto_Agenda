<?php

	session_start();
	$conexion = new mysqli('localhost', 'root', '1234', 'agenda');

	$datos = array(
								'fechaInicio'=>$_POST['start_date'],
								'fechaFinalizacion'=>$_POST['end_date'],
								'horaInicio'=>$_POST['start_hour'],
								'horaFinalizacion'=>$_POST['end_hour']);

	if($conexion->connect_error){
		die('Error: '.$conexion->connect_error);
	} 

	if(isset($_SESSION['idUsuarios'])){
		$id = $_POST['id'];

		$sqlacualizar = 'UPDATE eventos SET "'. $datos .'" WHERE idEventos = '.$id.' ';

		if(!$sqlacualizar){
			$respuesta['msg'] = "No se actualizaron los datos";
		}else{
			$respuesta['msg'] = "OK";
		}

	}

	$conexion->close();
	echo json_encode($respuesta);


 ?>
