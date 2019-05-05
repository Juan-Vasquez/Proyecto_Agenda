<?php

	$email = $_POST['username'];
	$pass = $_POST['password'];
	
	$conexion = new mysqli('localhost', 'root', '1234', 'agenda');
	

	if($conexion->connect_error){
		die('Error de conexion: '.$conexion->connect_error);
	}else{
		$consulta = 'SELECT * FROM usuarios WHERE email="'.$email.'";';
		$con = mysqli_query($conexion, $consulta);

		$array = array();
		while($row = mysqli_fetch_array($con)){
			$array = array('email'=>$row['email'], 'password'=>$row['password']);
		}

		
		if(password_verify($pass, $array['password'])){
			echo "Exito";	
		}else{
			echo "Error";
		}
		
	}


?>