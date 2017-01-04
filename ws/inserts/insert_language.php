<?php
/**
 * Inserta un nuevo leguaje en la base de datos.
 * Creado por Albertoha94 el 08/11/16.
 */
include '../../conn.php';

//-- Getting the info.
$_lang = $_GET['language'];
$_abv  = $_GET['language_abv'];

//-- Insert language.
$sql_add = "INSERT INTO `idioma`(`titulo`, `abreviacion`)
			VALUES ('". $_lang ."', '". $_abv ."')";

if (mysqli_query($conn, $sql_add)) {
    echo "Nuevo lenguaje insertado.\n";
}
else {
    echo "Error: " . $sql_add . "<br>" . mysqli_error($conn);
}

$sql_log = "INSERT INTO `log`(`mensaje`, `type`)
			VALUES ('Se ha agregado el lenguaje ". $_lang ."(". $_abv .").', 0)";
if (mysqli_query($conn, $sql_log)) {
    echo "Log de lenguaje insertado creado.";
}
else {
    echo "Error: " . $sql_log . "<br>" . mysqli_error($conn);
}
?>
