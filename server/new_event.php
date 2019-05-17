<?php

	session_start();
	
	$conexion = new mysqli('localhost', 'root', '1234', 'agenda');

	if($conexion->connect_error){
		die('Error: '.$conexion->connect_error);
	}

	if(isset($_SESSION['idUsuarios'])){
			

		$sql = 'INSERT INTO eventos (titulo, fechaInicio, diaEntero, fechaFinalizacion, horaInicio, horaFinalizacion, fk_usuarios) VALUES("'.$_POST['titulo'].'", "'.$_POST['start_date'].'", '.$_POST['allDay'].', "'.$_POST['end_date'].'", "'.$_POST['start_hour'].'", "'.$_POST['end_hour'].'", "'.$_SESSION['idUsuarios'].'");';

		$result = $conexion->query($sql);

		$json = array();
		if(!$result){
			$json['msg'] = "No se ingreso el evento";
		}else{
			$json['msg'] = "OK";
		}

		
	}

	$conexion->close();
	echo json_encode($json);
	?>
