<?php

	session_start();
	$data['tituloEvento'] = $_POST['titulo'];
	$data['fechaInicio'] = $_POST['start_date'];
	$data['todoDia'] = $_POST['allDay']; // devuelve true o false
		$data['fechaFin'] = $_POST['end_date'];
		$data['horaFin'] = $_POST['end_hour'];
		$data['horaInicio'] = $_POST['start_hour'];
	

	$conexion = new mysqli('localhost', 'root', '1234', 'agenda');

	if($conexion->connect_error){
		die("Error de conexion: ".$conexion->connect_error);
	}else{
		if(isset($_SESSION['idUsuarios'])){
			$i = 1;
			if($_POST['allDay'] == true){
				$consulta = 'INSERT INTO eventos VALUES('.$i.', "'.$data['tituloEvento'].'", "'.$data['fechaInicio'].'", '.$data['todoDia'].', "'.null.'", "'.null.'", "'.null.'", '.$_SESSION['idUsuarios'].');';
				$i++;
			}else{
				$consulta = 'INSERT INTO eventos VALUES('.$i.', "'.$data['tituloEvento'].'", "'.$data['fechaInicio'].'", '.$data['todoDia'].', "'.$data['fechaFin'].'", "'.$data['horaInicio'].'", "'.$data['horaFin'].'", '.$_SESSION['idUsuarios'].');';
				$i++;
			}

			$result = mysqli_query($conexion, $consulta);
			if(!$result){
				$response['msg'] = "No se agrego el evento, intentelo nuevamente";
			}else{
				$response['msg'] = "OK";
			}

			echo json_encode($response);
		}
	}
  


 ?>
