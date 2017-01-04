<?php
/**
 * Hace un update dentro de un lenguaje.
 * Creado por Albertoha94 el 05/Dic/16.
 */
include '../../conn.php';

//-- Obteniendo la info.
$_id = $_GET['language_id'];
$_lang = $_GET['language'];
$_abv = $_GET['language_abv'];

//-- Insert language.
$sql_add = "UPDATE `idioma`
						SET `titulo` = '". $_lang ."',
								`abreviacion` = '". $_abv ."',
								`fecha_edicion` = NOW(),
								`ultimo_cambio` = NOW()
						WHERE id_idioma = ". $_id;

if (mysqli_query($conn, $sql_add)) {
    echo "Lenguaje actualizado.";
}
else {
    echo "Error: " . $sql_add . "<br>" . mysqli_error($conn);
}

$sql_log = "INSERT INTO `log`(`mensaje`, `type`)
			VALUES ('Se ha modificado el lenguaje a ". $_lang ."(". $_abv .").', 1)";
if (mysqli_query($conn, $sql_log)) {
    echo "Log de lenguaje editado creado.";
}
else {
    echo "Error: " . $sql_log . "<br>" . mysqli_error($conn);
}
?>
