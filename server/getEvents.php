<?php
  
	session_start();
	$conexion = new mysqli('localhost', 'root', '1234', 'agenda');
	
	if($conexion->connect_error){
		die('Error: '.$conexion->connect_error);
	}

	if(isset($_SESSION['idUsuarios'])){

		$sql = 'SELECT * FROM eventos WHERE eventos.fk_usuarios = '.$_SESSION['idUsuarios'].';';

		$respuesta = $conexion->query($sql);

		if(!$respuesta){
			$res['msg'] = "Error PHP-004 en la comunicacion con el servidor";
		}else{
				
			if($respuesta->num_rows <= 0){
				$res['msg'] = "OK";
				$res['eventos'] = [];
			}else{

				$json = array();
				
				while ($row = $respuesta->fetch_assoc()) {
					$evento = array(
					'id'=>$row['idEventos'],
					'fk_usuarios'=>$row['fk_usuarios'],
					'title'=>$row['titulo'],
					'start'=>$row['fechaInicio'].' '.$row['horaInicio'],
					'allDay'=>$row['diaEntero'],
					'end'=>$row['fechaFinalizacion'].' '.$row['horaFinalizacion'] ,
					);
					array_push($json, $evento);
				}

				$res['eventos']=$json;
				$res['msg'] = "OK";
			}	
				
		}
		

	}

	$conexion->close();
	echo json_encode($res);

 ?>
