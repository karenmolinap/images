<?php
	$servername = "localhost";
	$username = "Karen";
	$dbname   = "videorenta";
	$password = "password";	

	$sql    = $_POST['sql'];
	$tipo = $_POST['tipo'];
	#$tipo = "a"; // Insert, Update, Delete
	#$tipo = "b"; // Select
	#$sql="INSERT INTO socios (nombre,direccion, telefono) VALUES ('Marco Bott', 'Las Montanas', '9342321')";
	#$sql = "UPDATE socios SET nombre = 'Saitama',direccion = 'Ciudad Z',telefono = '123242' WHERE idSocio = 2";
	#$sql = "DELETE FROM socios WHERE idSocio = 5";
	#$sql = "SELECT * FROM socios";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
	
	if($tipo=="a"){ // Si es un query
		if ($conn->query($sql) === TRUE) {
			echo "Registro Insertado de Manera Exitosa"."\n";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else{ // Si es un result
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo $row["idSocio"].",". $row["nombre"].",". $row["direccion"].",". $row["telefono"]. "\n";
			}
		} else {
			echo "0 results";
		}
	}

	$conn->close();
	die ('Finalizando...');

 
?>