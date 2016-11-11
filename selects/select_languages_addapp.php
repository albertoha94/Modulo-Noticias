<?php
/**
 * Created by Albertoha94 on 11/11/16.
 * Changes:
 * 11/11/16:	-Included the connection.
 				-Added the SELECT query and echoed the results.
 */
include '../conn.php';

//-- Select idioma.
$sql = "SELECT `id_idioma`, `titulo`, `abreviacion`
		FROM `idioma` 
		WHERE activo = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    //-- Output data of each row
     while($row = $result->fetch_assoc()) {
     	//print_r($row);
     	echo "<option value='". $row["id_idioma"] ."'>". $row["titulo"] ."(". $row["abreviacion"] .")</option>";
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "<option value='-1'>No hay idiomas</option>";
}
?>