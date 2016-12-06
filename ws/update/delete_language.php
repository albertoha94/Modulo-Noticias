<?php
/**
 * Creado por Albertoha94 el 05/Dic/16.
 * Cambios:
 * 05/Dic/16:	-Script creado en base a update_language.
 *						-Actualizado query para hacer una funcion diferente.
 *						-Actualizado mensajes de respuesta.
 */
include '../../conn.php';

//-- Obteniendo la info.
$_id = $_GET['language_id'];

//-- Insert language.
$sql_add = "UPDATE `idioma`
						SET `fecha_baja`= NOW(),
								`activo`= 0
						WHERE activo = 1
						AND id_idioma = ". $_id;

if (mysqli_query($conn, $sql_add)) {
    echo "Lenguaje eliminado.";
}
else {
    echo "Error: " . $sql_add . "<br>" . mysqli_error($conn);
}

//$sql_log = "INSERT INTO `log`(`mensaje`, `type`, `fecha_creacion`)
//			VALUES ('Agregado lenguaje ". $_lang ."(". $_abv .").', 0, NOW())";
//if (mysqli_query($conn, $sql_log)) {
//    echo "Nuevo log lenguaje created successfully";
//}
//else {
//    echo "Error: " . $sql_log . "<br>" . mysqli_error($conn);
//}
?>
