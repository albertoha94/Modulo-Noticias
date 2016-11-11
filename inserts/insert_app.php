<?php
/**
 * Created by Albertoha94 on 08/11/16.
 * Changes:
 * 08/11/16:	-Included the connection.
 				-Added variables to get the info sent.
 				-Added the INSERT query.
 */
include '../conn.php';

//-- Getting the info.
$_name_app = $_GET['name_app'];
$_deflang = $_GET['deflang'];

//-- Insert app.
if(mysqli_query($conn, "INSERT INTO `apps`(`titulo`, `idioma_default`, `fecha_creacion`, `activo`) 
				     VALUES ('". $_name_app ."', ". $_deflang .", NOW(), 1)")){
	echo "Nueva app agregada.";
} 
else {
	echo "Error agregando la app.";
}

//-- Insert log of the app.
mysqli_query($conn, "INSERT INTO `log`(`mensaje`, `type`, `fecha_creacion`) 
					 VALUES ('Agregada aplicación ". $_name_app .".', 0, NOW())");
?>