<?php
	
	$hots = "localhost";
	$user = "root";
	$pass = "1234";
	$bd = "agenda";
	
	$user1 = "juan@hotmail.com";
	$pass1 = "1234";
	$user2 = "carlos@hotmail.com";
	$pass2 = "12345";
	$user3 = "rebeca@hotmail.com";
	$pass3 = "123456";
	
	$passHass1 = password_hash($pass1, PASSWORD_DEFAULT);
	$passHass2 = password_hash($pass2, PASSWORD_DEFAULT);
	$passHass3 = password_hash($pass3, PASSWORD_DEFAULT);
	
	$coneccion = new mysqli($hots, $user, $pass, $bd);

	if($coneccion->connect_error){
		echo 'Error: '. $coneccion->connect_error;
	}else{

		$usuario1 = 'INSERT INTO usuarios VALUES (1, "Juan Vasquez","'.$user1.'",  "'.$passHass1.'", "1991/10/02");';
		$usuario2 = 'INSERT INTO usuarios VALUES (2, "Carlos Melgar", "'.$user2.'", "'.$passHass2.'", "1990/08/05");';
		$usuario3 = 'INSERT INTO usuarios VALUES (3, "Rebeca Carrillo", "'.$user3.'", "'.$passHass3.'", "1992/01/05");';

		$u1 = mysqli_query($coneccion, $usuario1);
		$u2 = mysqli_query($coneccion, $usuario2);
		$u3 = mysqli_query($coneccion, $usuario3);
		
		if($u1 && $u2 && $u3){
			echo 'Se crearon satisfactoriamente los usuarios';
		}else{
			die('query error: '.mysqli_error($coneccion));
		}

	}

	$coneccion->close();

?>
