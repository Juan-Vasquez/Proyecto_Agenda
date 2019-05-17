<?php

	session_start();
	$conexion = new mysqli('localhost', 'root', '1234', 'agenda');

	if($conexion->connect_error){
		die('Error: '.$conexion->connect_error);
	}

	if(isset($_SESSION['idUsuarios'])){
		$idEliminar = $_POST['id'];

		$sql = 'DELETE FROM eventos WHERE idEventos = '.$idEliminar.'; ';

		$respuesta = $conexion->query($sql);

		if(!$respuesta){
			$request['msg'] = "Error al eliminar el evento";
		}else{
			$request['msg'] = "Has eliminado el evento exitosamente";
		}

	}
	
	echo json_encode($request);
	$conexion->close();

 ?>
