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
			//echo "Registro Insertado de Manera Exitosa"."\n";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}elseif($tipo=="b"){ // Result de ACTOR,DIRECTOR,GENERO
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo $row["id"].",". $row["nombre"]. "\n";
			}
		} else {
			echo "No hay resultados";
		}
	}elseif($tipo=="c"){ // Result de SOCIO
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo $row["idSocio"].",". $row["nombre"].",". $row["direccion"].",". $row["telefono"]. "\n";
			}
		} else {
			echo "No hay resultados";
		}
	}elseif($tipo=="d"){ // Result de FAV ACTOR, FAV DIRE, FAV GENE, ESPERA, CINTAS, PEL ACTORES
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo $row["id"].",". $row["iddos"].",". $row["idtres"]."\n";
			}
		} else {
			echo "No hay resultados";
		}
	}elseif($tipo=="e"){ // Result de PELICULAS
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo $row["idPelicula"].",". $row["nombre"].",". $row["idDirector"].",". $row["idGenero"]."\n";
			}
		} else {
			echo "No hay resultados";
		}
	}elseif($tipo=="f"){ // Result de PRESTAMOS
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo $row["idPrestamo"].",". $row["fecha"].",". $row["idSocio"].",". $row["idCinta"]."\n";
			}
		} else {
			echo "No hay resultados";
		}
	}elseif($tipo=="g"){ // Result de PRESTAMOS
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo $row["idDevolucion"].",". $row["fecha"].",". $row["idPrestamo"]."\n";
			}
		} else {
			echo "No hay resultados";
		}
	}elseif($tipo=="h"){ // CONCAT Spinner
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo $row["nombre"]."\n";
			}
		} else {
			echo "No hay resultados";
		}
	}
	$conn->close();
	die ('');

 
?>
