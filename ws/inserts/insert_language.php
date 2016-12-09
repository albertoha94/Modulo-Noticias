<?php
/**
 * Creado por Albertoha94 el 08/11/16.
 * Cambios:
 * 08/11/16:	-Incluido el archivo de conexion.
 *						-Agregadas variables para obtener la información.
 *						-Agregados queries de INSERT para la base de datos y log.
 *08/Dic/16:	-Actualizada direccion de conn.php.
 */
include '../../conn.php';

//-- Getting the info.
$_lang = $_GET['language'];
$_abv  = $_GET['language_abv'];

//-- Insert language.
$sql_add = "INSERT INTO `idioma`(`titulo`, `abreviacion`, `fecha_creacion`)
			VALUES ('". $_lang ."', '". $_abv ."', NOW())";

if (mysqli_query($conn, $sql_add)) {
    echo "Nuevo lenguaje successfully.\n";
}
else {
    echo "Error: " . $sql_add . "<br>" . mysqli_error($conn);
}

$sql_log = "INSERT INTO `log`(`mensaje`, `type`, `fecha_creacion`)
			VALUES ('Se ha agregado el lenguaje ". $_lang ."(". $_abv .").', 0, NOW())";
if (mysqli_query($conn, $sql_log)) {
    echo "Nuevo log lenguaje created successfully";
}
else {
    echo "Error: " . $sql_log . "<br>" . mysqli_error($conn);
}
?>
