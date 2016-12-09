<?php
/**
 * Creado por Albertoha94 el 05/Dic/16.
 * Cambios:
 * 05/Dic/16:	-Script creado en base a insert_language.
 *						-Actualizado para hacer un update.
 *						-Comentado temporalmente los logs.
 */
include '../../conn.php';

//-- Obteniendo la info.
$_id = $_GET['language_id'];
$_lang = $_GET['language'];
$_abv = $_GET['language_abv'];

//-- Insert language.
$sql_add = "UPDATE `idioma`
						SET `titulo`='". $_lang ."',
								`abreviacion`='". $_abv ."',
								`fecha_edicion`=NOW()
						WHERE activo = 1
						AND id_idioma = ". $_id;

if (mysqli_query($conn, $sql_add)) {
    echo "Lenguaje actualizado.";
}
else {
    echo "Error: " . $sql_add . "<br>" . mysqli_error($conn);
}

$sql_log = "INSERT INTO `log`(`mensaje`, `type`, `fecha_creacion`)
			VALUES ('Se ha modificado el lenguaje ". $_lang ."(". $_abv .").', 1, NOW())";
if (mysqli_query($conn, $sql_log)) {
    echo "Nuevo log para una edicion de lenguaje creado";
}
else {
    echo "Error: " . $sql_log . "<br>" . mysqli_error($conn);
}
?>
