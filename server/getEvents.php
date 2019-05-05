<?php
  
	session_start();
	$conexion = new mysqli('localhost', 'root', '1234', 'agenda');

	if($conexion->connect_error){
		die('Error de conexion');
	}else{

		if(isset($_SESSION['idUsuarios'])){
			$consulta = 'SELECT idEventos, titulo, fechaInicio, diaEntero, fechaFinalizacion, horaInicio, horaFinalizacion FROM eventos WHERE fk_usuarios='.$_SESSION['idUsuarios'].';';

			$result = mysqli_query($conexion, $consulta);
				$json = array();
			if(!$result){
				$json['msg']="No hay Eventos cargados";
			}else{

				while ($row = mysqli_fetch_array($result)) {
					$json['eventos'] = array(
																	'id'=>$row['idEventos'],
																	'titulo'=>$row['titulo'],
																	'fechaInicio'=>$row['fechaInicio'],
																	'diaEntero'=>$row['diaEntero'],
																	'fechaFinalizacion'=>$row['fechaFinalizacion'],
																	'horaInicio'=>$row['horaInicio'],
																	'horaFinalizacion'=>$row['horaFinalizacion']

					);		
				}
				$json['msg'] = "OK";
			}
			

			echo json_encode($json);
		}

	}


 ?>
