<?php
/**
 * Contiene el query para insertar una app basica en la base de datos.
 * Creada por Albertoha94 el 08/Nov/16.
 */
 include '../../conn.php';

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
$sql_log = "INSERT INTO `log`(`mensaje`, `type`, `fecha_creacion`)
VALUES ('Se ha agregado la aplicación ". $_name_app .".', 0, NOW())";
if (mysqli_query($conn, $sql_log)) {
	echo "Nuevo log lenguaje created successfully";
}
else {
	echo "Error: " . $sql_log . "<br>" . mysqli_error($conn);
}

?>
